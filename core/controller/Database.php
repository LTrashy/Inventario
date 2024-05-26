<?php
class Database {
    private $user;
    private $pass;
    private $host;
    private $ddbb;
    private static $con;
    private static $db;

    function __construct(){
        $this->user = "root";
        $this->pass = "";
        $this->host = "localhost";
        $this->ddbb = "inventiolite";
    }

    function connect(){
        $con = new mysqli($this->host, $this->user, $this->pass, $this->ddbb);
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        $con->query("set sql_mode=''");
        return $con;
    }

    public static function getCon(){
        if(self::$con == null){
            self::$db = new Database();
            self::$con = self::$db->connect();
        }
        return self::$con;
    }
}
?>
