<?php

	class shop_bll {
	    private $dao;
	    private $db;
	    static $_instance;

  private function __construct() {
        $this->dao = shop_dao::getInstance();
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
  public function categories_BLL($arrArgument){
    return $this->dao->select_categories($this->db,$arrArgument);
  }
  public function obtain_data_details_BLL($arrArgument){
        $details=$this->dao->select_details($this->db,$arrArgument);
        $this->dao->update_visit_product($this->db,$arrArgument);
          return $details;
  }
  public function obtain_products_BLL(){
    return $this->dao->count_pagination($this->db);
  }
  public function obtain_pagination_BLL($arrArgument){
    return $this->dao->pagination($this->db, $arrArgument);
  }
  public function look_like_model_BLL($arrArgument){
    $user=decode_token($arrArgument['jwt']);
    $favorite=$this->dao->look_like($this->db, json_decode($user,true)['name'] ,$arrArgument['id']);
    if(empty($favorite)){
      $this->dao->insert_like($this->db, json_decode($user,true)['name'] ,$arrArgument['id']);
      return true;
    }else{
      $this->dao->delete_like($this->db, json_decode($user,true)['name'] ,$arrArgument['id']);
      return false;
    }
  }       
  public function save_favorites_model_BLL($arrArgument){
    $user=decode_token($arrArgument['jwt']);
    return $this->dao->select_like($this->db, json_decode($user,true)['name']);
  }       
}