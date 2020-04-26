<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';

include($path . "model/connect.php");

class DAOhome{



    /////////////////////////////////
        //SELECT
    ////////////////////////////////
  
    function select_img_year(){
        
        $winesAr= array();
        $sql="SELECT * FROM wines ORDER BY year LIMIT 4";

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
    function select_type($limit){
        
        $winesAr= array();
        $sql='SELECT type, img FROM categories LIMIT '. $limit . ',3';
        
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
    function addVisit($id){
        $sql='update categories set more_visited=more_visited+1 where type="'. $id . '"';
        $connection = Connection::con();

        $result = mysqli_query($connection, $sql);
        Connection::close($connection);
        return $result;
    }
    // function select_catimg(){
        
    //     $winesAr= array();
    //     $sql='SELECT * FROM categories';
        
    //     $connection = Connection::con();

    //     $result = mysqli_query($connection, $sql);
        
    //     if(mysqli_num_rows($result)>0){
    //         while ($row = mysqli_fetch_assoc($result)){
    //                 $winesAr[] = $row;
    //         }
    //     }
    //     Connection::close($connection);
    //     return $winesAr;
    // }
}