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
    // function details_list() {
    //     $json = array();
    //     $json = loadModel(MODEL_SHOP, "shop_model", "details_list_model");
    //     echo json_encode($json);
    // }
    
}