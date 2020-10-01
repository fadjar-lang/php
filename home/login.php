
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Restoran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
    
        <div class="row">
        
            <div class="col-4 mx-auto mt-4">
                <div class="form-grop">
                    <form action="" method="post">
                    <div><h3>Login Pelanggan</h3></div>
                    <div class="form-group">
                    <label for="kategori">Email</label>
                    <input type="email" name="email" required placeholder="email" class="form-control">
                    </div>

            <div class="form-grop">
                    <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" required placeholder="password" class="form-control">
                    </div>

                <div>
                <input type="submit" name="login" value="login" class="btn btn-primary">
                </div>
                </form>
                </div>

            </div>
        
        </div>

    </div>

</body>
</html>

<?php 

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM tblpelanggan WHERE email = '$email' AND password = '$password' AND aktif = 1";
        $count = $db->rowCount($sql);
        if ($count == 0) {
            echo "<center><h3>email atau password salah</h3><center>";
        }else {
            $sql = "SELECT * FROM tblpelanggan WHERE email = '$email' AND password = '$password' AND aktif = 1";
            $row = $db->getItem($sql);
            $_SESSION['pelanggan'] = $row['email'];
            $_SESSION['idpelanggan'] = $row['idpelanggan'];
            header("location: index.php");
        }
    }


?>