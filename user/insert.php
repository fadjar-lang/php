<h3>insert user</h3>
<div class="form-grop">
    <form action="" method="post">

        <div class="form-group w-50">
            <label for="user">Nama User</label>
            <input type="text" name="user" required placeholder="isi user" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="email">Email</label>
            <input type="email" name="email" required placeholder="isi email" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="password">Password</label>
            <input type="password" name="password" required placeholder="isi password" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="Konfirmasi">Konfirmasi Password</label>
            <input type="password" name="konfirmasi" required placeholder="isi password" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="level">Level</label><br>
            <select name="level" id="">
                <option value="admin">admin</option>
                <option value="koki">koki</option>
                <option value="kasir">kasir</option>
            </select>
        </div>

        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
        </form>
</div>

<?php 

    if (isset($_POST['simpan'])) {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = hash('sha256',  $_POST['password']);
        $konfirmasi = hash('sha256',  $_POST['konfirmasi']);
        $level = $_POST['level'];
        if ($password === $konfirmasi) {
            $sql = "INSERT INTO tbluser VALUES ('', '$user', '$email', '$password', '$level', 1)";  
            $db->runsql($sql);
            header("location: ?f=user&m=select");

        }else {
            echo "<h2>Password tidak sama</h2>";
        }
        
        
    }

?>