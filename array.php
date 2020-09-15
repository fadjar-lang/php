<?php
//array
// $nama = ["Budi", "Tejo", "Siti", "Makmur", 123, 2.4];
// var_dump($nama);
// echo "<br>";
// echo $nama[2];
// echo "<br>";

// for ($i=0; $i < 6 ; $i++) { 
//     echo $nama[$i]. "<br>";
// }

// foreach ($nama as $key) {
//     echo $key. "<br>";
// }

$nama = [
    "joni" => "surabaya",
    "budi" => "jakarta",
    "aldi" => "malang",
    "faris" => "sidoarjo"
    
];
var_dump($nama);
echo "<br>";
// echo $nama["joni"];

foreach ($nama as $key => $value) {
    echo $key. " => ". $value;
    echo "<br>";
}


?>