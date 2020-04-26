<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';

include($path . "model/connect.php");



class DAOsearch {

    function readType(){
        $winesAr= array();
        $sql='SELECT distinct type FROM wines ORDER BY type ASC';
        
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
    function readMark(){
        $winesAr= array();
        $sql='SELECT distinct mark FROM wines ORDER BY mark ASC';
        
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
    function searchDemand($idtype, $row){
        $winesAr= array();
        $sql='SELECT distinct mark FROM wines 
        WHERE '. $row .  ' LIKE "'. $idtype . '"';
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
    function autoComplete($auto, $valType){
        $winesAr= array();
        $sql='SELECT distinct name FROM wines 
        WHERE type="'. $valType .'" AND name LIKE "'. $auto .'%"';
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