<h3>REGISTRASI PELANGGAN</h3>
<div class="form-grop">
    <form action="" method="post">

        
        <div class="form-group w-50">
            <label for="">Pelanggan</label>
            <input type="text" name="pelanggan" required placeholder="isi pelanggan" class="form-control">
        </div>

        
        <div class="form-group w-50">
            <label for="">Alamat</label>
            <input type="text" name="alamat" required placeholder="isi alamat" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Telepon</label>
            <input type="text" name="telepon" required placeholder="isi telepon" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Email</label>
            <input type="email" name="email" required placeholder="isi email" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Password</label>
            <input type="password" name="password" required placeholder="isi password" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="konfirmasi" required placeholder="isi password" class="form-control">
        </div>

        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
        </form>
</div>

<?php 

    if (isset($_POST['simpan'])) {
        $pelanggan = $_POST['pelanggan'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];
        if ($password === $konfirmasi) {
            $sql = "INSERT INTO tblpelanggan VALUES ('', '$pelanggan', '$alamat', '$telepon', '$email', '$password', 1)"; 
            $db->runsql($sql);
            header("location: ?f=home&m=info");
        }else {
            echo "<h2>Password tidak sama</h2>";
        }
        
        
    }

?>