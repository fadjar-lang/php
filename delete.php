<?php 

require_once "../function.php";


    $sql = "DELETE FROM tblkategori WHERE idkategori = $id";
    $result = mysqli_query($conn, $sql);
    
    header("location: http://localhost/smk/restoran/kategori/select.php");
?>