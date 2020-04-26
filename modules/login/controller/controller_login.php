<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';
    include($path . "module/login/model/DAO_login.php");

session_start();

$daologin = new DAOlogin();

switch($_GET["op"]) {

    case 'login';
        if($_POST){
            $rdo=$daologin->select_user();
            if ($rdo===true){
                echo json_encode($rdo);
            }else{
                echo "error";
            }
        }
        include("module/login/view/login.html");
    break;
    case 'register';

        if($_POST){
            $check=$daologin->find_user();
            if(!$check){
                $rdo=$daologin->insert_user();
                echo json_encode($rdo);
            }else{
                echo "error";
            }
            
        }
        include("module/login/view/register.html");
    break;
    case 'activity';
        if (!isset($_SESSION['time'])){
            echo "active";
        }else{
            
            if((time() - $_SESSION['time']) >= 900) {
                echo "inactive";
                exit();
            }else{
                echo "active";
                exit();
            }
        }
    break;
    case 'logout';
        unset($_SESSION['type']);
        session_destroy();
    break;
    case 'reg_session';
        include($path . "module/login/model/regenerate_session.php");
        regenerate_session();
    break;
    
    default;
        include("view/includes/error404.php");
        break;
}