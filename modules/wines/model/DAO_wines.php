<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/Wines/';

include($path . "model/connect.php");

class DAOwine{



    /////////////////////////////////
        //SELECT
    ////////////////////////////////
  
    function select_all(){
        
        $winesAr= array();
        $sql="SELECT * FROM wines";
        
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
    function select_all_code($code){
        
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

    function select_name($code){
        $winesAr= array();

        $sql='SELECT name FROM wines WHERE code="'. $code .'"';
        $connection= Connection::con();

        $result= mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)>0){
            $winesAr = mysqli_fetch_assoc($result);
        }
        return $winesAr;
    }


    /////////////////////////////////
    //FUNCTIONS CRUD
    ////////////////////////////////
    function insert_wine($code, $name, $mark, $type, $grades, $origin, $year, $idcellar){
        // debug($name . $code);
        $boolphp=false;
        $error="";
        
         $sql= "INSERT INTO `wines`(code, name, mark, type, grades, origin, year, img_wine, idcellar, more_visited)" . " VALUES ( '$code','$name', '$mark', '$type', '$grades', '$origin', '$year', 'img', '$idcellar','0')";
         
         $connection = Connection::con();
         
         
         $result = mysqli_query($connection, $sql);
         Connection::close($connection);
        

         if($result){
            $boolphp=true;
          
		}else{
            $error="Error of query";
		}
		return array('error' => $error, 'boolphp' => $boolphp);
     }


    function update_wine($GETcode, $code, $name, $mark, $type, $grades, $origin, $year, $idcellar){

        $sql= "UPDATE wines SET code = '$code' , name = '$name' , mark = '$mark' , type = '$type', grades = '$grades' , origin = '$origin' , year = '$year', idcellar = '$idcellar' WHERE wines . code='$GETcode'" ;
        
        $connection = Connection::con();
       
        
        $result = mysqli_query($connection, $sql);
        Connection::close($connection);
        return $result;
        
    }
    function delete_wine($code){
        $sql='DELETE FROM wines WHERE code="'. $code .'"';
        $connection = Connection::con();
        $result= mysqli_query($connection, $sql);
        
        Connection::close($connection);
        return $result;
    
    }
    function delete_all_wine(){
        $sql='DELETE FROM `wines`';
        $connection = Connection::con();
        $result= mysqli_query($connection, $sql);
        
        Connection::close($connection);
        return $result;
    }
}