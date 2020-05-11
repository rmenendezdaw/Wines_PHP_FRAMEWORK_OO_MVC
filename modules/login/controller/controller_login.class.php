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
}