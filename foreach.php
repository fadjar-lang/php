<?php

    // $nama = ["tejo", "budi", "siti", "farid"];
    // var_dump($nama);

    // foreach ($nama as $key) {
    //     echo $key. "<br>";
    // }

    $nama = [
        "tejo" => "surabaya",
        "budi" => "sidoarjo",
        "siti" => "malanag"
    ];
    var_dump($nama);

    echo "<br>";

    foreach ($nama as $key => $value) {
        echo $key."-". $value;
        echo "<br>";
    }
?>