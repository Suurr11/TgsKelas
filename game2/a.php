<?php
session_start();

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
}

if (!isset($_SESSION['minesweeper'])) {
    $_SESSION['minesweeper'] = new Minesweeper(5, 5, 5);
}

$game = $_SESSION['minesweeper'];
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['row'], $_POST['col'])) {
    $row = (int)$_POST['row'];
    $col = (int)$_POST['col'];

    $result = $game->revealCell($row, $col);
    if ($result === 'BOOM') {
        $gameOver = true;
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
        table { border-collapse: collapse; margin: 20px auto; }
        td { width: 40px; height: 40px; text-align: center; vertical-align: middle; border: 1px solid #000; font-size: 18px; }
        .hidden { background-color: #ccc; }
        .revealed { background-color: #fff; }
        .mine { background-color: red; color: white; }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Minesweeper</h1>
    <table>
        <?php for ($r = 0; $r < $game->rows; $r++): ?>
            <tr>
                <?php for ($c = 0; $c < $game->cols; $c++): ?>
                    <td class="<?php echo $game->revealed[$r][$c] ? ($game->board[$r][$c] === -1 ? 'mine' : 'revealed') : 'hidden'; ?>">
                        <?php if ($game->revealed[$r][$c]): ?>
                            <?php echo $game->board[$r][$c] === -1 ? '*' : $game->board[$r][$c]; ?>
                        <?php else: ?>
                            <form method="POST" style="margin: 0;">
                                <input type="hidden" name="row" value="<?php echo $r; ?>">
                                <input type="hidden" name="col" value="<?php echo $c; ?>">
                                <button style="width: 100%; height: 100%;">&nbsp;</button>
                            </form>
                        <?php endif; ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

    <?php if (isset($gameOver) && $gameOver): ?>
        <h2 style="text-align: center; color: red;">Game Over! You hit a mine.</h2>
        <p style="text-align: center;"><a href="?restart=1">Restart Game</a></p>
        <?php unset($_SESSION['minesweeper']); ?>
    <?php endif; ?>
</body>
</html>
