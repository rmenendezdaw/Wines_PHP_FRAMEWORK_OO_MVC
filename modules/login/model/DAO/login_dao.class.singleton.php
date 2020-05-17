<?php
class login_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function select_user($db, $user) {        
        $sql="select * from users where username='$user'";
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }
    public function checkUser($db, $username) {        
        $sql="SELECT * FROM users WHERE username='$username' ";
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }
    public function insertUser($db,$username,$email,$avatar,$encrypt_password, $token) {        
        $sql="insert into users values ('$username','$email','user','$avatar','$encrypt_password',5000,'$token',0,'$username','null')";
        $stmt = $db->execute($sql);
        return $stmt;

    }
    public function activate_user($db,$token) {        
        $sql="update users set activate=1 where token_email='$token'";
        $stmt = $db->execute($sql);
    }
    public function updateToken($db,$username,$token) {        
        $sql="UPDATE users SET token_recover='$token' WHERE username='$username'";
        $stmt = $db->execute($sql);
    }
    public function updatePassword($db, $password, $token) {        
        $sql="UPDATE users SET password='$password' WHERE token_recover='$token'";
        print_r($sql);
        $stmt = $db->execute($sql);
    }
}