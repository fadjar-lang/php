<h3>Detail Pembelian</h3>
<h3>insert kategori</h3>
<div class="form-grop">
    <form action="" method="post">

        <div class="form-group w-50 float-left">
            <label for="kategori">Tanggal Awal</label>
            <input type="date" name="tawal" required class="form-control">
        </div>

        <div class="form-group w-50 float-left">
            <label for="kategori">Tanggal Akhir</label>
            <input type="date" name="tahir" required class="form-control">
        </div>

        <div>
            <input type="submit" name="simpan" value="cari" class="btn btn-primary">
        </div>
        </form>
</div>


<?php 

    $jumlahdata = $db->rowCount("SELECT idorderdetail FROM vorderdetail");
    $banyak = 3;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai = ($p * $banyak) - $banyak;      
    }else {
        $mulai = 0;
    }




    $sql = "SELECT * FROM vorderdetail ORDER BY idorderdetail DESC LIMIT $mulai,$banyak";

        if (isset($_POST['simpan'])) {
        $tawal = $_POST['tawal'];
        $tahir = $_POST['tahir'];
        $sql = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$tawal' AND '$tahir' ";
       // echo $sql;
    }

    $row = $db->getAll($sql);
    $no = 1+$mulai;
    $total = 0;

?>

<div class="float-left mr-4">

</div>

<table class="table table-bordered w-70">

    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Alamat</th>
        </tr>
    </thead>

    <tbody>
        <?php if(!empty($row)) { ?>
        <?php foreach($row as $r) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $r['pelanggan']; ?></td>
            <td><?= $r['tglorder']; ?></td>
            <td><?= $r['menu']; ?></td>
            <td><?= $r['harga']; ?></td>
            <td><?= $r['jumlah']; ?></td>
            <td><?= $r['jumlah'] * $r['harga']; ?></td>
            <td><?= $r['alamat']; ?></td>

            <?php 
            
                $total = $total + ($r['jumlah'] * $r['harga']);
            
            ?>
        </tr>
        <?php endforeach; ?>
        <?php } ?>

        <tr>
        
            <td colspan="6"><h3>GRAND TOTAL :</h3></td>
            <td><h4><?= $total; ?></h4></td>

        </tr>

    </tbody>
</table>

<?php 

    for ($i=1; $i <= $halaman; $i++) { 
    echo '<a href="?f=orderdetail&m=select&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp'; 
    }


?>