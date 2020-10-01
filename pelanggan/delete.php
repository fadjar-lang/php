<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM tblpelanggan WHERE idpelanggan = $id";
        $db->runsql($sql);
        header("location: ?f=pelanggan&m=select");
    }

?>