<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $row = $db->getItem("SELECT * FROM tblpelanggan WHERE idpelanggan = $id");
        if ($row['aktif']==0) {
            $aktif = 1;
        }else {
            $aktif = 0;
        }
        
        $sql = "UPDATE tblpelanggan SET aktif = $aktif WHERE idpelanggan = $id";
        $db->runsql($sql);
        header("location: ?f=pelanggan&m=select ");
    }

?>