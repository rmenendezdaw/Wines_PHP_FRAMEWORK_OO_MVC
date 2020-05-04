<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';

include($path . "model/connect.php");

class DAOshop{



    /////////////////////////////////
        //SELECT
    ////////////////////////////////
    function countWines(){
        $winesAr= array();
        $sql='SELECT count(*) as total from wines';
        
        $connection = Connection::con();

        $result = mysqli_query($connection, $sql);
        Connection::close($connection);

        if(mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){
                    $winesAr[] = $row;
            }
        }

        return $winesAr;
    }
    function select_Typecat($type){
        
        $winesAr= array();
        $sql='SELECT * FROM wines WHERE type = "'. $type .'"';
        
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
    function pagWines($ofset) {
        
        $winesAr= array();
        $sql='SELECT * FROM wines ORDER BY more_visited DESC LIMIT 10 OFFSET ' . $ofset;
        
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
    function select_all() {
        
        $winesAr= array();
        $sql='SELECT * FROM wines ORDER BY more_visited LIMIT 10';
        
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

    function select_code ($code){
        $winesAr= array();
        
        $sql='SELECT * FROM wines WHERE code="'. $code .'"';
        $connection = Connection::con();
        
        $result= mysqli_query($connection, $sql);

          if(mysqli_num_rows($result)>0){
                $winesAr = mysqli_fetch_assoc($result);
        }
        Connection::close($connection);
        return $winesAr;
    }
    function select_filter($checks){
        
        $winesAr= array();
        $sql='SELECT * FROM wines '. "$checks" .'';
        
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
    function select_location(){
        
        $winesAr= array();
        $sql='SELECT * FROM cellar';
        
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
    function searchDemand($name){
        $winesAr= array();
        $sql='SELECT * FROM wines 
        WHERE name LIKE "'. $name . '%" ';
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
    function searchDemandtyma($type, $mark){
        $winesAr= array();
        $sql='SELECT * FROM wines 
        WHERE type="'. $type .'" and mark="'. $mark .'"';
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
    function searchDemandmark($mark){
        $winesAr= array();
        $sql='SELECT * FROM wines 
        WHERE mark="'. $mark .'"';
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
        $sql='update wines set more_visited=more_visited+1 where code="'. $id . '"';
        $connection = Connection::con();

        $result = mysqli_query($connection, $sql);
        Connection::close($connection);
        return $result;
    }

}