<?php

	class home_bll {
	    private $dao;
	    private $db;
	    static $_instance;

	    private function __construct() {
            $this->dao = home_dao::getInstance();
            $this->db = db::getInstance();
	    }

	    public static function getInstance() {
            if (!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }

	        return self::$_instance;
        }
        public function slider_BLL(){
            return $this->dao->select_slider($this->db);
          }
          public function categories_BLL($arrArgument){
            return $this->dao->select_categories($this->db,$arrArgument);
          }
          public function obtain_data_details_BLL($arrArgument){
            return $this->dao->select_data_details($this->db,$arrArgument);
          }
         
}