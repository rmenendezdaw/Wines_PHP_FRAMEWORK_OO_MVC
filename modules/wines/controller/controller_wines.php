<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';

	include($path . "module/wines/model/DAO_wines.php");
	include ($path . "module/wines/model/Utils.php");


	session_start();
	if (isset($_SESSION['time'])){
		$_SESSION['time']=time();
	} 
	$daowines = new DAOwine();
    switch($_GET["op"]){
		case 'list';

            try{
				
				$rdo = $daowines->select_all();
								
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }
				
            include("module/wines/view/list_wine.php");
            break;
            
		 case 'create';
		 
			if ($_POST){
				// print_r($_POST);
				// die;
				if(!Utils::check($_POST['code'])){
					
					$rdo = $daowines->insert_wine($_POST['code'] , $_POST['name'] , $_POST['mark'] ,$_POST['type'], $_POST['grades'] , $_POST['origin'] , $_POST['year'], $_POST['cellar']);
					if($rdo['boolphp']){				
						echo '<script language="javascript">alert("Registrado en la base de datos correctamente")</script>';
						$callback = 'index.php?page=controller_wines&op=list';
						die('<script>window.location.href="'.$callback .'";</script>');
					}else{
						
						$error = $rdo['error'];
					}
				}else{
					$error = "Element duplicated";

			}
			}
			include ("module/wines/view/form_wines.php");
			//$check=true;
			
            break;
            
		 case 'update';

				$rdo = $daowines->select_all_code($_GET['id']);
				if ($_POST){
					if(!Utils::check($_POST['code']) || $_POST['code'] == $_GET['id']){
						$resup = $daowines->update_wine($_GET['id'], $_POST['code'], $_POST['name'], $_POST['mark'], $_POST['type'], $_POST['grades'], $_POST['origin'], $_POST['year'], $_POST['cellar']);
						if($resup){
							echo '<script language="javascript">alert("Update successfull")</script>';
							$callback = 'index.php?page=controller_wines&op=list';
							die('<script>window.location.href="'.$callback .'";</script>');
						}else{
							$callback = 'index.php?page=503';
							die('<script>window.location.href="'.$callback .'";</script>');
						}
					}else{
						$error = "Element duplicated";
					}
				}
	
			include("module/wines/view/update_wine.php");
            break;
        
            
		case 'delete';
			$daoname = new DAOwine();
			$name=$daoname->select_name($_GET['id']);
			
			if ($_GET['conf'] == "0") {
				if(!Utils::check($_POST['code'])){
					$rdo = $daowines->delete_wine($_GET['id']);
	
					if($rdo){
						echo '<script language="javascript">alert("Nice")</script>';
						$callback = 'index.php?page=controller_wines&op=list';
						die('<script>window.location.href="'.$callback .'";</script>');
					}else{
						$callback = 'index.php?page=503';
						die('<script>window.location.href="'.$callback .'";</script>');
					}
				}else{
					$error="Error";
				}
			}else if($_GET['conf'] == "1") {
				

			}

			include("module/wines/view/delete_wine.php");
			break;
			case 'delete_all':
			
			if($_GET['conf'] == "1") {	

				$rdo = $daowines->delete_all_wine();
				if($rdo){
					echo '<script language="javascript">alert("Delete successfull")</script>';
					$callback = 'index.php?page=controller_wines&op=list';
					die('<script>window.location.href="'.$callback .'";</script>');
				}else{
					$callback = 'index.php?page=503';
					die('<script>window.location.href="'.$callback .'";</script>');
				}
			}
			include("module/wines/view/delete_all_wine.php");
			break;

			case 'read_modal';

			// echo ($_GET['modal']);
			// exit;

					try{
						$rdo = $daowines->select_all_code($_GET['modal']); 
					}catch (Exception $e){
						echo json_encode("error");
						exit;
					}
					if(!$rdo){
						echo json_encode("error");
						exit;
					}else{
						echo json_encode($rdo);
					}
			break;
        default;
            include("view/includes/error404.php");
            break;
    }