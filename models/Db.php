<?php 

class DataBaseHandler {

    private $host;
    private $user;
    private $password;
    private $db;

    private static $myDbHandler = null;

    private function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
    }

    public static function Connection()
    {
        if (self::$myDbHandler == null){
            self::$myDbHandler = new DataBaseHandler();
            return self::$myDbHandler;
        }
        else 
            return self::$myDbHandler;
    }
    
    public function OpenConnection() {
        $connection = new mysqli($this->host, $this->user, $this->password);
        
        if ($connection->connect_error){
            return FALSE;
        }

        $this->db = $connection;
        return true;
    }

    function connectToDB( $database){
        //Attempt to connect to the Database
        $connectionDB = mysqli_select_db($this->db, $database);
        //If connection to the Database failed save the system error message 
        if ($connectionDB === FALSE) {
            return FALSE;
        }
            return TRUE;
        }

    public function getDataBase() {
        return $this->db;
    }
}