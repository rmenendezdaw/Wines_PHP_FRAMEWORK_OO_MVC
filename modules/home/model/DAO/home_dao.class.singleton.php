<?php
class home_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function select_slider($db) {
        $sql = "SELECT * FROM wines ORDER BY year LIMIT 4";
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }
    public function select_categories($db,$limit) {
        $sql='SELECT type, img FROM categories LIMIT '. $limit . ',3';
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }

    public function select_data_details($db,$arrArgument) {
        $sql = "SELECT name,chip,breed,sex,stature,picture,date_birth,tlp,country,province,city,cinfo,dinfo FROM dogs WHERE chip = '$arrArgument'";
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }
}