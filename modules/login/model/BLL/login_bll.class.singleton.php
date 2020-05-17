<?php

	class login_bll {
	    private $dao;
	    private $db;
	    static $_instance;

    private function __construct() {
          $this->dao = login_dao::getInstance();
          $this->db = db::getInstance();
    }

    public static function getInstance() {
          if (!(self::$_instance instanceof self)){
              self::$_instance = new self();
          }

        return self::$_instance;
      }
    public function obtain_data_list_BLL(){
      return $this->dao->select_all_products($this->db);
    }
    public function compare_BLL($arrArgument){
        $user=$this->dao->select_user($this->db, $arrArgument['username']);
        if (password_verify($arrArgument['password'],$user[0]['password'])){
          return json_encode("Okay");
        }
        return "false";
    }
    public function setUser_data_BLL($arrArgument){
      $username=$arrArgument['username'];
      $email=$arrArgument['email'];
      $token=generate_Token_secure(20);
      $encrypt_password=password_hash($arrArgument['password'], PASSWORD_DEFAULT);
      $hash_avatar=md5 (strtolower( trim( $email) ) );
      $avatar="https://www.gravatar.com/avatar/$hash_avatar?s=40&d=identicon";

      $checkUser=$this->dao->checkUser($this->db,$arrArgument['username']);
      if(empty($checkUser)){
        $this->dao->insertUser($this->db,$username,$email,$avatar,$encrypt_password,$token);
        return $token;
      }
      return false;
    }
    public function activate_user_BLL($arrArgument){
      return $this->dao->activate_user($this->db, $arrArgument);
    }
    public function recover_model_BLL($arrArgument){
      $user=$arrArgument['username'];
      $token=generate_Token_secure(20);
      $checkUser=$this->dao->select_user($this->db, $user);
      if(!empty($checkUser)){
        $this->dao->updateToken($this->db,$user,$token);
        return array('token'=> $token, 'email'=>$checkUser[0]['email']);
      }
      return false;
    }
    public function changePass_model_BLL($arrArgument){
      $newPassword=password_hash($arrArgument['password'], PASSWORD_DEFAULT);
      return $this->dao->updatePassword($this->db, $newPassword, $arrArgument['token']);
    }     
}