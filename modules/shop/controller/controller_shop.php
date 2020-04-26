<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';

	include($path . "module/shop/model/DAO_shop.php");
    
session_start();
if (isset($_SESSION['time'])){
    $_SESSION['time']=time();
} 

    $daoshop = new DAOshop();
    switch($_GET["op"]){
		case 'list';
            include("module/shop/view/list_shop.html");
            break;

        case 'list_all';
            
            $rdo = $daoshop->select_all($_GET['num']); //Ediit wine se

            if(!$rdo){
                echo ("error");
                exit;
            }else{
                echo json_encode($rdo);
            }
            break;
        case 'details_prod';
        
					$rdo = $daoshop->select_code($_GET['modal']); 
				
					if(!$rdo){
						echo ("error");
						exit;
					}else{
						echo json_encode($rdo);
					}
            break;
        case 'list_cat';
        
					$rdo = $daoshop->select_Typecat($_GET['type']); 
				
					if(!$rdo){
						echo ("error");
						exit;
					}else{
						echo json_encode($rdo);
					}
            break;
        case 'filter';
        
            $rdo = $daoshop->select_filter($_GET['checks']); 
                  
            if(!$rdo){
                echo ("error");
                exit;
            }else{
                echo json_encode($rdo);
            }
        break;
        case 'map';
        
            $rdo = $daoshop->select_location(); 
        
            if(!$rdo){
                echo ("error");
                exit;
            }else{
                echo json_encode($rdo);
            }
        break;
        case 'demand_name';
            if ($_GET['type']&&($_GET['mark']=='false')&&($_GET['val']=='')){
                $rdo = $daoshop->select_Typecat($_GET['type']);
            }else if($_GET['val']){
                $rdo = $daoshop->searchDemand($_GET['val']);
            }else if($_GET['mark']!='false'&&($_GET['type']=='false')&&($_GET['val']=='')){
                $rdo = $daoshop->searchDemandmark($_GET['mark']);
            }else{
                $rdo = $daoshop->searchDemandtyma($_GET['type'],$_GET['mark']);
            }
            if(!$rdo){
                echo ("error");
                exit;
            }else{
                echo json_encode($rdo);
            }
        break;
        case 'visited';
            
        $rdo = $daoshop->addVisit($_GET['id']);
        
            if(!$rdo){
                echo ("error");
                exit;
            }else{
                echo json_encode($rdo);
            }
        break;
        case 'count_pagination';
            
            $rdo = $daoshop->countWines();

            if(!$rdo){
                echo ("error");
                exit;
            }else{
                echo json_encode($rdo);
            }
        break;
        case 'pagination';
        
            $rdo = $daoshop->pagWines($_GET['item_num']);
            echo json_encode($rdo);
            exit;
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