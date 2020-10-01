<?php 

    $jumlahdata = $db->rowCount("SELECT idorder FROM vorders");
    $banyak = 2;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai = ($p * $banyak) - $banyak;      
    }else {
        $mulai = 0;
    }




    $sql = "SELECT * FROM vorders ORDER BY status,idorder ASC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql);
    
    $no = 1+$mulai;

?>

<div class="float-left mr-4">

</div>
<h3>Order Pembelian</h3>
<table class="table table-bordered w-50">

    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Bayar</th>
            <th>Kembali</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        <?php if(!empty($row)) { ?>
        <?php foreach($row as $r) : ?>
        <?php 
            
            if ($r['status']==0) {
                $status = '<td><a href="?f=order&m=bayar&id='.$r['idorder'].'">Bayar</a></td>';
            }else {
                $status = '<td>Lunas</td>';
            }

        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $r['pelanggan']; ?></td>
            <td><?= $r['tglorder']; ?></td>
            <td><?= $r['total']; ?></td>
            <td><?= $r['bayar']; ?></td>
            <td><?= $r['kembali']; ?></td>
            <?= $status; ?>
        </tr>
        <?php endforeach; ?>
        <?php } ?>
    </tbody>
</table>

<?php 

    for ($i=1; $i <= $halaman; $i++) { 
    echo '<a href="?f=order&m=select&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp'; 
    }


?>