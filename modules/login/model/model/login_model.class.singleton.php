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
    public function recover_model($arrArgument){
        return $this->bll->recover_model_BLL($arrArgument);
    }
    public function changePass_model($arrArgument){
        return $this->bll->changePass_model_BLL($arrArgument);
    }
    public function social_model($arrArgument){
        return $this->bll->social_model_BLL($arrArgument);
    }
    public function return_token_model($arrArgument){
        return $this->bll->return_token_model_BLL($arrArgument);
    }
}