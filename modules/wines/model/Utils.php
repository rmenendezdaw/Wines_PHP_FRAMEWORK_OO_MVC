
<?php
// include("module/wines/model/DAO_wines.php");

class Utils {
    public static function check($code) {
    $value=false;
    
    $daoconnect= new DAOwine;
    $check= $daoconnect->select_all();

    

    foreach ($check as $row){

        if($row['code'] == $code){
            $value=true;
        }
    }
    return $value;
    }
}