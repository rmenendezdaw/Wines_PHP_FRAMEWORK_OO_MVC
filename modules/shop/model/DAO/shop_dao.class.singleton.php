<?php
class shop_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function select_all_products($db) {        
        $sql='SELECT * FROM wines ORDER BY more_visited DESC ';
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }

}