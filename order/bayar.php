<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tblorder WHERE idorder = $id";
        $row = $db->getItem($sql);
    }

?>
<h3>pembayaran order</h3>
<div class="form-grop">
    <form action="" method="post">

        <div class="form-group w-50">
            <label for="kategori">Total</label>
            <input type="number" name="total" required value="<?= $row['total']; ?>" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="kategori">Bayar</label>
            <input type="number" name="bayar" required class="form-control">
        </div>

        <div>
            <input type="submit" name="simpan" value="bayar" class="btn btn-primary">
        </div>
        </form>
</div>

<?php 

    if (isset($_POST['simpan'])) {
        $bayar = $_POST['bayar'];
        $kembali = $bayar - $row['total'];
        $sql = "UPDATE tblorder SET bayar=$bayar, kembali=$kembali, status=1 WHERE idorder = $id";
        if ($kembali<0) {
            echo '<h3>PEMBAYARAN KURANG</h3>';
        }else {
        $db->runsql($sql);
        header("location: ?f=order&m=select");
        }
        
    }

?>