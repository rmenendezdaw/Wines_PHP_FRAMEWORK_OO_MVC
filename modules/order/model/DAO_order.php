<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';

include($path . "model/connect.php");

class DAOorder {
    function select_order(){
        
        $winesAr= array();
        $sql="SELECT name,mark,grades,origin,year FROM wines";
        
        $connection = Connection::con();

        $result = mysqli_query($connection, $sql);
        
        if(mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){
                    $winesAr[] = $row;
            }
        }
        Connection::close($connection);

        return $winesAr;

    }
}