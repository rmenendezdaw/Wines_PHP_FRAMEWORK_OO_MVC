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
        $sql="select * from users where id_user='$user'";
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }
    public function checkUser($db, $username) {        
        $sql="SELECT * FROM users WHERE id_user='$username' ";
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
        $stmt = $db->execute($sql);
    }
    public function insertSocial($db,$username,$email,$avatar,$id) {        
        $sql="insert into users values ('$username','$email','user','$avatar','null',5000,'null',0,'$id','null')";
        $stmt = $db->execute($sql);
        return $stmt;

    }
    public function select_user_token($db, $name) {        
        $sql="SELECT * FROM users WHERE id_user='$name' ";
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }
}