<?php
class controller_home {

    function construct() {
        $_SESSION['module'] = "home";
    }
    
    function home_list() {
        
        require(VIEW_PATH_INC . "top_page.php");
        require(VIEW_PATH_INC . "header.html");
        require(VIEW_PATH_INC . "menu/menu.php");
        loadView('modules/home/view/','home_list.html');
        require(VIEW_PATH_INC . "footer.html");
    }
    function load_slider() {
        $json = array();
        $json = loadModel(MODEL_HOME, "home_model", "slider", "hola");
        echo json_encode($json);
    }
}