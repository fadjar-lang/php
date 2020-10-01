<?php 

    class DB{

    private $host = "127.0.0.1";
    private $user = "root";
    private $pass = "";
    private $database = "dbrestoran";
    private $koneksi;


    public function __construct()
    {
        $this->koneksi = $this->koneksiDb();
    }


    public function koneksiDb()
    {
        $koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->database);
        return $koneksi;
    }


    public function getAll($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
            
        }
        if (!empty($data)) {
            return $data;
        }
        
    }

    //untuk mengambil satu data
    public function getItem($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    //untuk menghitung baris yang ada didalamj data
    public function rowCount($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        $count = mysqli_num_rows($result);
        return $count;
    }

    public function runsql($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
    }

    public function pesan($text="")
    {
        echo $text;
    }

}

    
    


?>