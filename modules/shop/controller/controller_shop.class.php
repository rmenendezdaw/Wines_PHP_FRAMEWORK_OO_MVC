<?php
class controller_shop {

    function construct() {
        $_SESSION['module'] = "shop";
    }
    
    function shop_list() {
        require(VIEW_PATH_INC . "top_page_shop.php");
        require(VIEW_PATH_INC . "header.html");
        require(VIEW_PATH_INC . "menu/menu.php");
        loadView('modules/shop/view/','shop_list.html');
        require(VIEW_PATH_INC . "footer.html");
    }
    function product_list() {
        $json = array();
        $json = loadModel(MODEL_SHOP, "shop_model", "obtain_data_list");
        echo json_encode($json);
    }
    function categories_list() {
        $json = array();
        $json = loadModel(MODEL_SHOP, "shop_model", "load_categories_model", $_GET['param']);
        echo json_encode($json);
    }
    function details_list() {
        $json = array();
        $json = loadModel(MODEL_SHOP, "shop_model", "details_list_model", $_GET['param']);
        echo json_encode($json);
    }
    function count_products_shop() {
        $json = array();
        $json = loadModel(MODEL_SHOP, "shop_model", "count_products_model");
        echo json_encode($json);
    }
    function pagination_shop() {
        $json = array();
        $json = loadModel(MODEL_SHOP, "shop_model", "pagination_list_model", $_GET['param']);
        echo json_encode($json);
    }
    function look_favorites() {
        $json = loadModel(MODEL_SHOP, "shop_model", "look_like_model", $_POST);
        echo json_encode($json);
    }
    function save_favorites() {
        $json = loadModel(MODEL_SHOP, "shop_model", "save_favorites_model", $_POST);
        echo json_encode($json);
    }
    
}