<?php 
include("config.php");

class Database{
    public $connection;

    public function __construct(){
        $this->db_connection();
    }

    public function db_connection(){
        //$this->connection = mysqli_connect(DB_HOST, username: DB_USER, password: DB_PASS, database: DB_NAME);
        $this->connection = new mysqli(DB_HOST, username: DB_USER, password: DB_PASS, database: DB_NAME);

        if($this->connection->connect_errno){
            die("Database connection failed badly " . $this->connection->connect_error);
        }
    }

    public function query($sql){
        $result = $this->connection->query($sql);
        $this->confirm($result);
        return $result;
    }

    private function confirm($result){
        if(!$result){
            die("Query Faield " . $this->connection->error);
        }
    }

    public function str_escape($string){
        return $this->connection->real_escape_string($string);
    }

    public function inserted_id(){
        return $this->connection->insert_id;
    }
}

$database = new Database();