<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';

	include($path . "module/favorites/model/DAO_favorites.php");
    session_start();
if (isset($_SESSION['time'])){
    $_SESSION['time']=time();
} 

    $daofavorites = new DAO_favorites();
    switch($_GET["op"]){
        case 'look_fav';
            if(isset($_SESSION['username'])){
                    $rdo=$daofavorites->look_like();
                    if($rdo===true){
                        $result=$daofavorites->delete_fav();
                    }else{
                        $result=$daofavorites->insert_fav();
                    }
                    echo json_encode($result);
            }else{
                echo "error";
            }
        break;
        case 'select_fav';
            $rdo=$daofavorites->select_like();
            echo json_encode($rdo);
        break;

        default;
            include("view/includes/error404.php");
            break;
    }