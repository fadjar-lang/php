<form action="" method="get">
        nama:
        <input type="text" name="nama">
        alamat:
        <input type="text" name="alamat">
        <input type="submit" name="submit" value="submit">
</form>

<?php

if (isset($_GET['submit'])) {
    $nama = $_GET['nama'];
    $alamat = $_GET['alamat'];
    echo $nama;
    echo "<br>";
    echo $alamat;
}
    
?>

