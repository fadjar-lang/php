<?php 

    session_start();
    require_once "../dbcontroller.php";
    $db = new DB;

    if (!isset($_SESSION['user'])) {
        header("location: http://localhost/smk/restoran/admin/login.php");
    }

    if (isset($_GET['log'])) {
        session_destroy();
        header("location: login.php");
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE | APLIKASI RESTORAN SMK </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    
<div class="container">

    <div class="row mt-4">
        <div class="col-md-3">
            <a href="index.php"><h3>ADMIN PAGE</h3></a>
        </div>

        <div class="col-md-9">
            <div class="float-right mt-4"><a href="?log=logout">logout</a> </div>
            <div class="float-right mt-4 mr-4">User : <a href="?f=user&m=updateuser&id=<?= $_SESSION['iduser']; ?>"><?= $_SESSION['user']; ?></a> </div>
            <div class="float-right mt-4 mr-4">Level : <?= $_SESSION['level']; ?></div>
        </div>
    </div>    

    
    <div class="row mt-5">
        <div class="col-md-3">
            <ul class="nav flex-column">

            <?php 
            
            $level = $_SESSION['level'];
            switch ($level) {
                case 'admin':
                    echo '
                <li class="nav-item"> <a class="nav-link" href="?f=kategori&m=select">kategori</a></li>
                <li class="nav-item"> <a class="nav-link" href="?f=menu&m=select">menu</a></li>
                <li class="nav-item"> <a class="nav-link" href="?f=pelanggan&m=select">pelanggan</a></li>
                <li class="nav-item"> <a class="nav-link" href="?f=order&m=select">order</a></li>
                <li class="nav-item"> <a class="nav-link" href="?f=orderdetail&m=select">order detail</a></li>
                <li class="nav-item"> <a class="nav-link" href="?f=user&m=select">user</a></li>
                    ';
                    break;

                case 'kasir':
                    echo '
                <li class="nav-item"> <a class="nav-link" href="?f=order&m=select">order</a></li>
                <li class="nav-item"> <a class="nav-link" href="?f=orderdetail&m=select">order detail</a></li>
                    
                    ';
                    break;    

                case 'koki':
                    echo '
                    <li class="nav-item"> <a class="nav-link" href="?f=orderdetail&m=select">order detail</a></li>
                    ';
                    break;    
                
                default:
                    echo 'tidak ada menu';
                    break;
            }
            
            ?>

            </ul>
        </div>

        <div class="col-md-9">
            <?php 
                if (isset($_GET['f']) && isset($_GET['m'])) {
                    $f = $_GET['f'];
                    $m = $_GET['m'];
                    $file = '../'.$f.'/'.$m.'.php';
                    require_once $file;
                }
            ?>
        
        </div>
    
    </div>


    <div class="row mt-5">
        <div class="col">
            <p class="text-center">2020 - copyright@fajar.com</p>
        </div>
    
    </div>

    
</div>

</body>
</html>