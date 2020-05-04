<?php
class home_model {

    private $bll;
    static $_instance;

    private function __construct() {

        $this->bll = home_bll::getInstance();

    }

    public static function getInstance() {
        
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    public function slider(){
        return $this->bll->slider_BLL();
    }
    public function load_categories_model($arrArgument){
        return $this->bll->categories_BLL($arrArgument);
    }
    public function obtain_data_details($arrArgument){
        return $this->bll->obtain_data_details_BLL($arrArgument);
    }
    
}