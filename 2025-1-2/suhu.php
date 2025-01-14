<form action="" method="post">
 <input type="number" name="suhu" placeholder="Suhu">
 <select name="dari">
 <option value="celcius">Celcius</option>
 <option value="fahrenheit">Fahrenheit</option>
 <option value="kelvin">Kelvin</option>
 </select>
 <select name="ke">
 <option value="celcius">Celcius</option>
 <option value="fahrenheit">Fahrenheit</option>
 <option value="kelvin">Kelvin</option>
 </select>
 <button type="submit" name="konversi">Konversi</button>
</form>

<?php
if (isset($_POST['konversi'])) {
 $suhu = $_POST['suhu'];
 $dari = $_POST['dari'];
 $ke = $_POST['ke'];
 echo konversiSuhu($suhu, $dari, $ke);
}
function celciusToFahrenheit($celcius) {
    return ($celcius * 9/5) + 32;
   }
   
   function celciusToKelvin($celcius) {
    return $celcius + 273.15;
   }
   
   function fahrenheitToCelcius($fahrenheit) {
    return ($fahrenheit - 32) * 5/9;
   }
   
   function fahrenheitToKelvin($fahrenheit) {
    return ($fahrenheit - 32) * 5/9 + 273.15;
   }
   
   function kelvinToCelcius($kelvin) {
    return $kelvin - 273.15;
   }
   
   function kelvinToFahrenheit($kelvin) {
    return ($kelvin - 273.15) * 9/5 + 32;
   }

   function konversiSuhu($suhu, $dari, $ke) {
    switch ($dari . "_" . $ke) {
    case "celcius_fahrenheit":
    return celciusToFahrenheit($suhu);
    case "celcius_kelvin":
    return celciusToKelvin($suhu);
    case "fahrenheit_celcius":
    return fahrenheitToCelcius($suhu);
    case "fahrenheit_kelvin":
    return fahrenheitToKelvin($suhu);
    case "kelvin_celcius":
    return kelvinToCelcius($suhu);
    case "kelvin_fahrenheit":
    return kelvinToFahrenheit($suhu);
    default:
    return "Error: Konversi tidak valid!";
    }
   }
?>