<?php

class Connection {
    public static function con(){
        $host='localhost';
        $user="raul";
        $pass="Raul1234@";
        $db="Wines";
       // $port=3306;

        $connect = mysqli_connect($host, $user, $pass, $db);
        if (!$connect) {
            echo mysqli_connect_error();
        }
        return $connect;
    }
    public static function close($connect){
        mysqli_close($connect);
    }

}