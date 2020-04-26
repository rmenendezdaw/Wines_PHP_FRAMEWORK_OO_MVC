
<?php
session_start();

if (isset($_GET['page'])){
	switch($_GET['page']){
		case "controller_login";
			include("module/login/controller/".$_GET['page'].".php");
			break;
		case "controller_shop";
			include("module/shop/controller/".$_GET['page'].".php");
			break;
		case "controller_home";
			include("module/home/controller/".$_GET['page'].".php");
			break;
		case "controller_wines";
			if(isset($_SESSION)&& $_SESSION['type']==='admin'){
				include("module/wines/controller/".$_GET['page'].".php");
			}else{
				include("view/includes/error404.php");
			}
			break;
		case "controller_order";
			include("module/order/controller/".$_GET['page'].".php");
			break;
		case "services";
			include("module/services/".$_GET['page'].".php");
			break;
		case "aboutus";
			include("module/aboutus/".$_GET['page'].".php");
			break;
		case "controller_contact";
			include("module/contact/controller/".$_GET['page'].".php");
			break;
		case "controller_cart";
			include("module/cart/controller/".$_GET['page'].".php");
			break;
		case "404";
			include("view/includes/error".$_GET['page'].".php");
			break;
		case "503";
			include("view/includes/error".$_GET['page'].".php");
			break;
		default;
			include("module/home/controller/controller_home.php");
			break;
	}
}else{
	$_GET['op']="list";
	include("module/home/controller/controller_home.php");
 
}
?>