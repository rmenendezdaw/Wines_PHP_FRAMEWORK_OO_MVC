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
        $json = loadModel(MODEL_HOME, "home_model", "slider");
        echo json_encode($json);
    }
    function load_categories() {
        // print_r($_POST['data']);
        $json = array();
        $json = loadModel(MODEL_HOME, "home_model", "load_categories_model", $_POST['data']);
        echo json_encode($json);
    }
    function add_visit(){
        // print_r($_POST['code']);
        $json = array();
        $json = loadModel(MODEL_HOME, "home_model", "add_visit_model", $_POST['code']);
        echo json_encode($json);
    }
}