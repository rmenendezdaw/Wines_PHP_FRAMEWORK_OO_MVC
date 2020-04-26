<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';
    include($path . "module/cart/model/DAO_cart.php");

session_start();

$daocart = new DAOcart();

switch($_GET["op"]) {

    case "list";
        include("module/cart/view/cart.html");
        break;
    case "listCart";
        $rdo=$daocart->listCart();
        echo json_encode($rdo);
        break;
    case "saveCart";
         $rdo=$daocart->saveCart();
        echo json_encode($rdo);
        break;
    case "getCart";
        $rdo=$daocart->getCart();
        if (!$rdo){
            echo 'error';
        }else{
            echo json_encode($rdo);
        }
        break;
    case "checkOut";
        
        if($_SESSION['username']){
            $rdo=$daocart->getMoney();
            if(!$rdo){
                echo 'error';
            }else{
                echo json_encode($rdo);
            }
        }else{
            echo 'noUser';
        }
        break;
    default;
        include("view/includes/error404.php");
        break;
}