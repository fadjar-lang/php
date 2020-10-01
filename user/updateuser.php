<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbluser WHERE iduser = $id";
        $row = $db->getItem($sql);
        
    }



?>

<h3>insert user</h3>
<div class="form-grop">
    <form action="" method="post">

        <div class="form-group w-50">
            <label for="user">Nama User</label>
            <input type="text" name="user" required value="<?= $row['user']; ?>" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="email">Email</label>
            <input type="email" name="email" required value="<?= $row['email']; ?>" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="password">Password</label>
            <input type="password" name="password" required value="<?= $row['password']; ?>" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="Konfirmasi">Konfirmasi Password</label>
            <input type="password" name="konfirmasi" required value="<?= $row['password']; ?>" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="level">Level</label><br>
            <select name="level" id="">
                <option value="admin" <?php if($row['level']==="admin") echo "selected" ?>>admin</option>
                <option value="koki" <?php if($row['level']==="koki") echo "selected" ?>>koki</option>
                <option value="kasir" <?php if($row['level']==="kasir") echo "selected" ?>>kasir</option>
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
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];
        $level = $_POST['level'];
        if ($password === $konfirmasi) {
            $sql = "UPDATE tbluser SET user='$user',email='$email',password='$password',level='$level' WHERE iduser=$id";  
            $db->runsql($sql);
            header("location: ?f=user&m=select");
        }else {
            echo "<h2>Password tidak sama</h2>";
        }
        
        
    }

?>