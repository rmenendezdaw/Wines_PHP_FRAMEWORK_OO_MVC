<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';
	//include($path . "module/wines/model/DAO_wines.php");

    include($path . "module/order/model/DAO_order.php");
    
    session_start();
	if (isset($_SESSION['time'])){
		$_SESSION['time']=time();
	} 
    switch ($_GET['op']) {
		case 'list':
				include("module/order/view/list_order.html");
				break;
		case 'datatable':

            try{
				$daoorder = new DAOorder();
				$rdo = $daoorder->select_order();
			} catch(Exception $e){
				echo json_encode("error");
			}

			if(!$rdo){
				echo json_encode("error");
			}
			else{
				echo json_encode($rdo);
			}
			break;
			
		default:
			include("view/inc/error404.php");
			break;
	}