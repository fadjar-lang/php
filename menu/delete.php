<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM tblmenu WHERE idmenu = $id";
        $db->runsql($sql);
        header("location: ?f=menu&m=select");
    }

?>