<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';

	include($path . "module/home/model/DAO_home.php");
    
session_start();
if (isset($_SESSION['time'])){
    $_SESSION['time']=time();
} 

    $daohome = new DAOhome();
    switch($_GET["op"]){
		case 'list';
            include("module/home/view/home.html");
            break;

        case 'slider':

            $rdo = $daohome->select_img_year(); 
            if(!$rdo){
                echo ("error");
                exit;
            }else{
                echo json_encode($rdo);
            }
        break;
        case 'type_cat':
        
            $rdo = $daohome->select_type($_GET['num']); 
            if(!$rdo){
                echo ("error");
                exit;
            }else{
                echo json_encode($rdo);
            }
        break;
        case 'visited':
        
        $rdo = $daohome->addVisit($_GET['id']); 
        if(!$rdo){
            echo ("error");
            exit;
        }else{
            echo json_encode($rdo);
        }
    break;

        default;
            include("view/includes/error404.php");
            break;
    }
