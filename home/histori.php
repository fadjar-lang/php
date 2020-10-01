<?php 

    $email = $_SESSION['pelanggan'];
    $jumlahdata = $db->rowCount("SELECT idorder FROM vorders WHERE email = '$email'");
    $banyak = 2;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai = ($p * $banyak) - $banyak;      
    }else {
        $mulai = 0;
    }




    $sql = "SELECT * FROM vorders WHERE email = '$email' ORDER BY tglorder DESC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql);
    
    $no = 1+$mulai;

?>

<div class="float-left mr-4">

</div>
<h3>Histori Pembelian</h3>
<table class="table table-bordered w-50">

    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Detail</th>
        </tr>
    </thead>

    <tbody>
        <?php if(!empty($row)) { ?>
        <?php foreach($row as $r) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $r['tglorder']; ?></td>
            <td><?= $r['total']; ?></td>
            <td><a href="?f=home&m=detail&id=<?= $r['idorder']; ?>">Detail</a></td>
        </tr>
        <?php endforeach; ?>
        <?php } ?>
    </tbody>
</table>

<?php 

    for ($i=1; $i <= $halaman; $i++) { 
    echo '<a href="?f=home&m=histori&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp'; 
    }


?>