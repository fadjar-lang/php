<?php 

    $jumlahdata = $db->rowCount("SELECT idpelanggan FROM tblpelanggan");
    $banyak = 3;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai = ($p * $banyak) - $banyak;      
    }else {
        $mulai = 0;
    }




    $sql = "SELECT * FROM tblpelanggan ORDER BY pelanggan ASC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql);
    
    $no = 1+$mulai;

?>


<h3>Pelanggan</h3>
<table class="table table-bordered w-70 mt-4">

    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($row as $r) : ?>
        <tr>
        <?php 
        
            if ($r['aktif']==1) {
                $status =  "AKTIF";
        }else {
            $status = "TIDAK AKTIF";
        } 
        
        ?>
            <td><?= $no++; ?></td>
            <td><?= $r['pelanggan']; ?></td>
            <td><?= $r['alamat']; ?></td>
            <td><?= $r['telepon']; ?></td>
            <td><?= $r['email']; ?></td>
            <td><a href="?f=pelanggan&m=delete&id=<?= $r['idpelanggan']; ?>">Delete</a></td>
            <td><a href="?f=pelanggan&m=update&id=<?= $r['idpelanggan']; ?>"><?= $status; ?></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 

    for ($i=1; $i <= $halaman; $i++) { 
    echo '<a href="?f=pelanggan&m=select&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp'; 
    }


?>