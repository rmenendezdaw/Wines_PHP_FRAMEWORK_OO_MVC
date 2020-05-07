<?php
class shop_model {

    private $bll;
    static $_instance;

    private function __construct() {

        $this->bll = shop_bll::getInstance();

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
    public function load_categories_model($arrArgument){
        return $this->bll->categories_BLL($arrArgument);
    }
    public function add_visit_model($arrArgument){
        return $this->bll->add_visit_BLL($arrArgument);
    }
    public function details_list_model($arrArgument){
        return $this->bll->obtain_data_details_BLL($arrArgument);
    }
    public function count_products_model(){
        return $this->bll->obtain_products_BLL();
    }
    public function pagination_list_model($arrArgument){
        return $this->bll->obtain_pagination_BLL($arrArgument);
    }
    
}