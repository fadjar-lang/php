<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $email = $_SESSION['pelanggan'];
    $jumlahdata = $db->rowCount("SELECT idorderdetail FROM vorderdetail WHERE idorder = $id");
    $banyak = 2;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai = ($p * $banyak) - $banyak;      
    }else {
        $mulai = 0;
    }




    $sql = "SELECT * FROM vorderdetail WHERE idorder = $id ORDER BY idorderdetail ASC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql);
    
    $no = 1+$mulai;

?>

<div class="float-left mr-4">

</div>
<h3>Detail Pembelian</h3>
<table class="table table-bordered w-50">

    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
        </tr>
    </thead>

    <tbody>
        <?php if(!empty($row)) { ?>
        <?php foreach($row as $r) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $r['tglorder']; ?></td>
            <td><?= $r['menu']; ?></td>
            <td><?= $r['harga']; ?></td>
            <td><?= $r['jumlah']; ?></td>
        </tr>
        <?php endforeach; ?>
        <?php } ?>
    </tbody>
</table>

<?php 

    for ($i=1; $i <= $halaman; $i++) { 
    echo '<a href="?f=home&m=detail&id='.$r['idorder'].'&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp'; 
    }


?>