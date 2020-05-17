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
        $sql="insert into users values ('$username','$email','user','$avatar','$encrypt_password',5000,'$token',0,'$username')";
        $stmt = $db->execute($sql);
        return $stmt;

    }
    public function activate_user($db,$token) {        
        $sql="update users set activate=1 where token_email='$token'";
        $stmt = $db->execute($sql);
    }
    public function pagination($db, $ofset) {        
        $sql='SELECT * FROM wines ORDER BY more_visited DESC LIMIT 10 OFFSET ' . $ofset;
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }
    public function update_visit_product($db, $code) {        
        $sql="UPDATE wines SET more_visited=more_visited+1 WHERE code='$code'";
        $stmt = $db->execute($sql);
    }
    
}