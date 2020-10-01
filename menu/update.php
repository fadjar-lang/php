<?php 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tblmenu WHERE idmenu = $id";
    $item = $db->getItem($sql);

    $idkategori = $item['idkategori'];
    
    
}
$row = $row = $db->getAll("SELECT * FROM tblkategori ORDER BY kategori ASC");

?>

<h3>Insert Menu</h3>
<div class="form-grop">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group w-50">
            <label for="menu">Kategori</label><br>
            <select name="idkategori" id="">
                <?php foreach($row as $r) : ?>
                <option <?php if($idkategori == $r['idkategori']) echo "selected" ?> value="<?= $r['idkategori']; ?>"><?= $r['kategori']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group w-50">
            <label for="menu">Nama Menu</label>
            <input type="text" name="menu" required value="<?= $item['menu']; ?>" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="harga">Harga</label>
            <input type="text" name="harga" number required value="<?= $item['harga']; ?>" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="gambar">Gambar</label><br>
            <input type="file" name="gambar">
        </div>

        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
        </form>
</div>

<?php 

    if (isset($_POST['simpan'])) {
        $idkategori = $_POST['idkategori'];
        $menu = $_POST['menu'];
        $harga = $_POST['harga'];
        $gambar = $item['gambar'];
        $temp = $_FILES['gambar']['tmp_name'];

        if (!empty($temp)) {
            $gambar = $_FILES['gambar']['name'];
            move_uploaded_file($temp, '../upload/'.$gambar);
        }

        $sql = "UPDATE tblmenu SET idkategori = $idkategori, menu = '$menu', gambar = '$gambar', harga = $harga
        WHERE idmenu = $id";
        $db->runsql($sql);
        header("location: ?f=menu&m=select");


        
    }

?>
