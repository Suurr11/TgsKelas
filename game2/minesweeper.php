<?php
session_start();

// Fungsi untuk memuat skor dari file
function loadScore() {
    $filename = 'score.json';
    if (file_exists($filename)) {
        $data = json_decode(file_get_contents($filename), true);
        return $data ?: ['wins' => 0, 'losses' => 0];
    }
    return ['wins' => 0, 'losses' => 0];
}

// Fungsi untuk menyimpan skor ke file
function saveScore($wins, $losses) {
    $filename = 'score.json';
    $data = json_encode(['wins' => $wins, 'losses' => $losses]);
    file_put_contents($filename, $data);
}

// Muat skor saat inisialisasi sesi
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = loadScore();
    $_SESSION['wins'] = $_SESSION['score']['wins'];
    $_SESSION['losses'] = $_SESSION['score']['losses'];
}

class Minesweeper {
    public $rows;
    public $cols;
    public $mines;
    public $board;
    public $revealed;

    public function __construct($rows, $cols, $mines) {
        $this->rows = $rows;
        $this->cols = $cols;
        $this->mines = $mines;
        $this->board = array_fill(0, $rows, array_fill(0, $cols, 0));
        $this->revealed = array_fill(0, $rows, array_fill(0, $cols, false));
        $this->placeMines();
        $this->calculateHints();
    }

    private function placeMines() {
        $placed = 0;
        while ($placed < $this->mines) {
            $row = rand(0, $this->rows - 1);
            $col = rand(0, $this->cols - 1);

            if ($this->board[$row][$col] !== -1) {
                $this->board[$row][$col] = -1;
                $placed++;
            }
        }
    }

    private function calculateHints() {
        for ($r = 0; $r < $this->rows; $r++) {
            for ($c = 0; $c < $this->cols; $c++) {
                if ($this->board[$r][$c] === -1) continue;

                $count = 0;
                foreach ($this->getNeighbors($r, $c) as [$nr, $nc]) {
                    if ($this->board[$nr][$nc] === -1) {
                        $count++;
                    }
                }
                $this->board[$r][$c] = $count;
            }
        }
    }

    private function getNeighbors($row, $col) {
        $neighbors = [];
        for ($dr = -1; $dr <= 1; $dr++) {
            for ($dc = -1; $dc <= 1; $dc++) {
                if ($dr === 0 && $dc === 0) continue;

                $nr = $row + $dr;
                $nc = $col + $dc;

                if ($nr >= 0 && $nr < $this->rows && $nc >= 0 && $nc < $this->cols) {
                    $neighbors[] = [$nr, $nc];
                }
            }
        }
        return $neighbors;
    }

    public function revealCell($row, $col) {
        if ($this->revealed[$row][$col]) return false;
        $this->revealed[$row][$col] = true;

        if ($this->board[$row][$col] === -1) {
            return 'BOOM';
        }

        if ($this->board[$row][$col] === 0) {
            foreach ($this->getNeighbors($row, $col) as [$nr, $nc]) {
                $this->revealCell($nr, $nc);
            }
        }

        return true;
    }

    public function isWin() {
        for ($r = 0; $r < $this->rows; $r++) {
            for ($c = 0; $c < $this->cols; $c++) {
                if (!$this->revealed[$r][$c] && $this->board[$r][$c] !== -1) {
                    return false;
                }
            }
        }
        return true;
    }
}

if (!isset($_SESSION['minesweeper'])) {
    $_SESSION['minesweeper'] = new Minesweeper(8, 8, 10);
}

$game = $_SESSION['minesweeper'];
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['row'], $_POST['col'])) {
    $row = (int)$_POST['row'];
    $col = (int)$_POST['col'];

    $result = $game->revealCell($row, $col);
    if ($result === 'BOOM') {
        $gameOver = true;
        $_SESSION['losses']++;
        saveScore($_SESSION['wins'], $_SESSION['losses']);
        unset($_SESSION['minesweeper']);
    } elseif ($game->isWin()) {
        $gameWin = true;
        $_SESSION['wins']++;
        saveScore($_SESSION['wins'], $_SESSION['losses']);
        unset($_SESSION['minesweeper']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minesweeper</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #4caf50, #1b5e20);
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px #333;
        }

        table {
            border-collapse: collapse;
            margin: 0 auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            border: 2px solid #fff;
        }

        td {
            width: 50px;
            height: 50px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #fff;
            background: #3f3d56;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            position: relative;
        }

        .hidden {
            background: #2e7d32;
            color: transparent;
        }

        .revealed {
            background: #81c784;
            color: #333;
        }

        .mine {
            background: #e57373;
            color: #fff;
        }

        button {
            width: 100%;
            height: 100%;
            background: none;
            border: none;
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }

        button:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        a {
            color: #ffd700;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Minesweeper</h1>
    <p>Total Wins: <?php echo $_SESSION['wins']; ?></p>
    <p>Total Losses: <?php echo $_SESSION['losses']; ?></p>
    <table>
        <?php for ($r = 0; $r < $game->rows; $r++): ?>
            <tr>
                <?php for ($c = 0; $c < $game->cols; $c++): ?>
                    <td class="<?php echo $game->revealed[$r][$c] ? ($game->board[$r][$c] === -1 ? 'mine' : 'revealed') : 'hidden'; ?>">
                        <?php if ($game->revealed[$r][$c]): ?>
                            <?php echo $game->board[$r][$c] === -1 ? '&#128163;' : $game->board[$r][$c]; ?>
                        <?php else: ?>
                            <form method="POST" style="margin: 0;">
                                <input type="hidden" name="row" value="<?php echo $r; ?>">
                                <input type="hidden" name="col" value="<?php echo $c; ?>">
                                <button>&nbsp;</button>
                            </form>
                        <?php endif; ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

    <?php if (isset($gameOver) && $gameOver): ?>
        <h2 style="color: #e74c3c;">Game Over! Loser!</h2>
        <p><a href="?restart=1">Restart Game</a></p>
    <?php elseif (isset($gameWin) && $gameWin): ?>
        <h2 style="color: #ffd700;">Congratulations! You cleared the board.</h2>
        <p><a href="?restart=1">Play Again</a></p>
    <?php endif; ?>
</body>
</html>
