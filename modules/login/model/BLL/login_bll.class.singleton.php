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
          public function obtain_data_details_BLL($arrArgument){
            $details=$this->dao->select_details($this->db,$arrArgument);
            $this->dao->update_visit_product($this->db,$arrArgument);
             return $details;
          }
         
}