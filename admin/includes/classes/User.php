<?php 

class User{

    protected static function query($sql){
        global $database;
        return $database->query($sql);
    }

    public function get_all_users(){
        $result = self::query("SELECT * from users");
        return mysqli_fetch_assoc($result);
    }

    public function get_user_by_id(int $id){
        $result = self::query("SELECT * FROM users WHERE id = {$id} LIMIT 1");
        return mysqli_fetch_array($result);
    }
}