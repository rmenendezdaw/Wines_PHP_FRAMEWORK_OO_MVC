<?php
class controller_login {

    function construct() {
        $_SESSION['module'] = "login";
    }
    
    function login_list() {
        require(VIEW_PATH_INC . "top_page_login.php");
        require(VIEW_PATH_INC . "header.html");
        require(VIEW_PATH_INC . "menu/menu.php");
        loadView('modules/login/view/','login.html');
        require(VIEW_PATH_INC . "footer.html");
    }
    function register_list() {
        require(VIEW_PATH_INC . "top_page_login.php");
        require(VIEW_PATH_INC . "header.html");
        require(VIEW_PATH_INC . "menu/menu.php");
        loadView('modules/login/view/','register.html');
        require(VIEW_PATH_INC . "footer.html");
    }
    function login() {
        echo loadModel(MODEL_LOGIN, "login_model", "compare_model", $_POST);
    }
    function register() {
        $insert=loadModel(MODEL_LOGIN, "login_model", "setUser_data", $_POST);

        $arrArgument = array(
            'type' => 'alta',
            'token' => $insert,
            'inputName' => $_POST['username'],
            'inputEmail' => $_POST['email'],
            'inputSubject' => $_POST['matter'],
            'inputMessage' => $_POST['message']
        );
        if($insert!=false){

            send_email($arrArgument);
            echo json_encode("success");
        }
    }
    function active_user() {
        loadModel(MODEL_LOGIN, "login_model", "activate_user", $_GET['param']);
        require(VIEW_PATH_INC . "top_page_login.php");
        require(VIEW_PATH_INC . "header.html");
        require(VIEW_PATH_INC . "menu/menu.php");
        loadView('modules/login/view/','login.html');
        require(VIEW_PATH_INC . "footer.html");
    }
    function recover_list() {
        require(VIEW_PATH_INC . "top_page_login.php");
        require(VIEW_PATH_INC . "header.html");
        require(VIEW_PATH_INC . "menu/menu.php");
        loadView('modules/login/view/','recover.html');
        require(VIEW_PATH_INC . "footer.html");
    }
    function recover() {
        $check=loadModel(MODEL_LOGIN, "login_model", "recover_model", $_POST);
        $arrArgument = array(
            'type' => 'changepass',
            'token' => $check['token'],
            'inputName' => $_POST['username'],
            'inputEmail' => $check['email'],
            'inputSubject' => $_POST['matter'],
            'inputMessage' => $_POST['message']
        );
        if($check){
            send_email($arrArgument);
            echo json_encode("success");
        }
    }
    function changePass_list() {
        if(isset($_GET['param'])){
            $_SESSION['token']=$_GET['param'];
        }
        require(VIEW_PATH_INC . "top_page_login.php");
        require(VIEW_PATH_INC . "header.html");
        require(VIEW_PATH_INC . "menu/menu.php");
        loadView('modules/login/view/','changePass.html');
        require(VIEW_PATH_INC . "footer.html");
    }
    function changePass() {
        $arrArgument=array('password'=>$_POST['password'], 'token'=>$_SESSION['token']);
        $check=loadModel(MODEL_LOGIN, "login_model", "changePass_model", $arrArgument);
    }
    function social() {
        echo loadModel(MODEL_LOGIN, "login_model", "social_model", $_POST);
        
    }
    function return_user_token(){
        echo loadModel(MODEL_LOGIN, "login_model", "return_token_model", $_POST['jwt']);
    }
}