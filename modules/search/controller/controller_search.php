<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';
include($path . "module/search/model/DAO_search.php");
session_start();
if (isset($_SESSION['time'])){
    $_SESSION['time']=time();
} 
$daosearch = new DAOsearch();
    switch($_GET["op"]){
        case 'type';
            
            $rdo = $daosearch->readType();

            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                echo json_encode($rdo);
            }

        break;
        case 'mark';
            
            $rdo = $daosearch->readMark();

            if(!$rdo){
                echo ("error");
                exit;
            }else{
                echo json_encode($rdo);
            }
        break;
        case 'demand';
            
            $rdo = $daosearch->searchDemand($_GET['com'], "type");
            
            if(!$rdo){
                echo ("error");
                exit;
            }else{
                echo json_encode($rdo);
            }
        break;
        
        case 'autocomplete';
       
            $rdo = $daosearch->autoComplete($_POST['auto'], $_POST['valType']);
            
            if(!$rdo){
                echo "error";
                exit;
            }else{
                echo json_encode($rdo);
            }
        break;
        default;
            include("view/includes/error404.php");
            break;
    }