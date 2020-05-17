<?php
class login_model {

    private $bll;
    static $_instance;

    private function __construct() {

        $this->bll = login_bll::getInstance();

    }

    public static function getInstance() {
        
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    public function obtain_data_list(){
        return $this->bll->obtain_data_list_BLL();
    }
    public function compare_model($arrArgument){
        return $this->bll->compare_BLL($arrArgument);
    }
    public function setUser_data($arrArgument){
        return $this->bll->setUser_data_BLL($arrArgument);
    }
    public function activate_user($arrArgument){
        return $this->bll->activate_user_BLL($arrArgument);
    }
    public function pagination_list_model($arrArgument){
        return $this->bll->obtain_pagination_BLL($arrArgument);
    }
    
}