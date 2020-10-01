<?php 

    $jumlahdata = $db->rowCount("SELECT idkategori FROM tblkategori");
    $banyak = 5;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai = ($p * $banyak) - $banyak;      
    }else {
        $mulai = 0;
    }




    $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC LIMIT $mulai,$banyak";
    $row = $db->getAll($sql);
    
    $no = 1+$mulai;

?>

<div class="float-left mr-4">
    <a class="btn btn-primary" href="?f=kategori&m=insert" role="button">Tambah data</a>
</div>
<h3>kategori</h3>
<table class="table table-bordered w-50">

    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>

    <tbody>
        <?php if(!empty($row)) { ?>
        <?php foreach($row as $r) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $r['kategori']; ?></td>
            <td><a href="?f=kategori&m=delete&id=<?= $r['idkategori']; ?>">Delete</a></td>
            <td><a href="?f=kategori&m=update&id=<?= $r['idkategori']; ?>">Update</a></td>
        </tr>
        <?php endforeach; ?>
        <?php } ?>
    </tbody>
</table>

<?php 

    for ($i=1; $i <= $halaman; $i++) { 
    echo '<a href="?f=kategori&m=select&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp'; 
    }


?>