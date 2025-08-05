<?php 
include("config.php");

class Database{
    public $connection;

    public function __construct(){
        $this->db_connection();
    }

    public function db_connection(){
        $this->connection = mysqli_connect(DB_HOST, username: DB_USER, password: DB_PASS, database: DB_NAME);

        if(mysqli_connect_errno()){
            die("Database connection failed badly" . mysqli_error());
        }
    }
}

$database = new Database();