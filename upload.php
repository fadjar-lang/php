<form action="" method="post" enctype="multipart/form-data">
    pilih file gambar :
    <input type="file" name="upload">
    <input type="submit" name="kirim" value="simpan">


</form>


<?php 

    if(isset($_POST['kirim'])) {

        // var_dump($_FILES['upload']);

        $name = $_FILES['upload']['name'];
        $temp = $_FILES['upload']['tmp_name'];

        move_uploaded_file($temp, 'gambar/'.$name);
    }

?>