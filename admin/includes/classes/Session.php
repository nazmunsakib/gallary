<?php 

class Session {

    private $signed_in = false;
    public  $user_id;
    private  $message;

    public function __construct(){
        session_start();
        $this->check_the_login();
    }

    public function login($user){
        if($user){
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }

    public function is_login(){
        return $this->signed_in;
    }

    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id      = $_SESSION['user_id'];
            $this->signed_in    = true;
        }else{
            unset($this->user_id);
            $this->signed_in   = false;
        }
    }

    public function message($msg = ""){
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
        }else{
            return $this->message;
        }
    }

    public function check_message(){
        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }else{
            $this->message = "";
        }
    }

}

$session = new Session();