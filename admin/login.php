<?php 

    session_start();
    require_once "../dbcontroller.php";
    $db = new DB;

?>
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
                    <div><h3>Login Restoran</h3></div>
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
        $password = hash('sha256', $_POST['password']);
        $sql = "SELECT * FROM tbluser WHERE email = '$email' AND password = '$password'";
        $count = $db->rowCount($sql);
        if ($count == 0) {
            echo "<center><h3>email atau password salah</h3><center>";
        }else {
            $sql = "SELECT * FROM tbluser WHERE email = '$email' AND password = '$password'";
            $row = $db->getItem($sql);
            $_SESSION['user'] = $row['email'];
            $_SESSION['level'] = $row['level'];
            $_SESSION['iduser'] = $row['iduser'];
            header("location: index.php");
        }
    }


?>