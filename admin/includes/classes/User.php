<?php 

class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    protected static function query($sql){
        global $database;
        $result = $database->query($sql);
        $data   = [];

        while( $row = mysqli_fetch_array($result)){
            $data[] = self::instantation($row);
        }

        return $data;
    }

    public static function get_all_users(){
       return self::query("SELECT * from users");
    }

    public static function get_user_by_id(int $id){
        $result = self::query("SELECT * FROM users WHERE id = {$id} LIMIT 1");
        return !empty($result) ? array_shift($result) : false;
    }

    public static function instantation($records){
        $the_object = new self;

        foreach($records as $the_attr => $value ){
            if($the_object->has_the_attribute($the_attr)){
                 $the_object->$the_attr = $value;
            }
        }

        return $the_object;
    }

    private function has_the_attribute($attr){
        $object_prop = get_object_vars($this);
        return array_key_exists($attr, $object_prop);
    }

    public static function verify_user($username, $password){
        global $database;
        $username = $database->str_escape($username);
        $password = $database->str_escape($password);

        $sql    = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
        $result = self::query($sql);

        return !empty($result) ? array_shift($result) : false;
    }

    public function create(){
        global $database;

        $username    = "'" . $database->str_escape($this->username) . "'";
        $password    = "'" . $database->str_escape($this->password) . "'";
        $first_name  = "'" . $database->str_escape($this->first_name) . "'";
        $last_name   = "'" . $database->str_escape($this->last_name) . "'";

        $sql = "INSERT INTO users (username, password, first_name, last_name)
            VALUES ($username, $password, $first_name, $last_name)";

        if ($database->query($sql)) {
            $this->id = $database->inserted_id();
            return true;
        }

        return false;
    }

    public function update(){
        global $database;

        $sql  = "UPDATE users SET ";
        $sql .= "username='" . $database->str_escape($this->username) . "', ";
        $sql .= "password='" . $database->str_escape($this->password) . "', ";
        $sql .= "first_name='" . $database->str_escape($this->first_name) . "', ";
        $sql .= "last_name='" . $database->str_escape($this->last_name) . "' ";
        $sql .= "WHERE id=" . (int)$this->id; 

        $database->query($sql);

        return $database->connection->affected_rows ? true : false;
    }

}