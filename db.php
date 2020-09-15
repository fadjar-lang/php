<?php 

    // properti 
    class DB
    {
        public $server = "localhost";
        private $user = "root";
        private $pass = "";
        private $database = "dbrestoran";

    public function __construct()
    {
        echo "function construct";
    }    

    // method
    public function selectData()
    {
        echo 'select data';
    }

    public function getDatabase()
    {
        return $this->database;
    }

    public function tampil()
    {
        $this->selectData();
    }

    public static function insertData()
    {
        echo "static funtion";
    }

    }


    DB::insertData();


    //$db = new DB;
    // $db->selectData();
    // echo '<br>';
    // echo $db->server;
    // echo '<br>';
    // echo $db->getDatabase();
    // echo '<br>';
    // $db->tampil();
    

?>