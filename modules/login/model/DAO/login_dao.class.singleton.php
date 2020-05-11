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
        $sql='SELECT * FROM wines ORDER BY more_visited DESC LIMIT 10 ';
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }
    public function select_categories($db, $type) {        
        $sql="SELECT * FROM wines WHERE type='$type' ";
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }
    public function select_details($db, $code) {        
        $sql="SELECT * FROM wines WHERE code='$code' ";
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }
    public function count_pagination($db) {        
        $sql="SELECT count(*) as total from wines";
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }
    public function pagination($db, $ofset) {        
        $sql='SELECT * FROM wines ORDER BY more_visited DESC LIMIT 10 OFFSET ' . $ofset;
        $stmt = $db->execute($sql);
        return $db->list($stmt);
    }
    public function update_visit_product($db, $code) {        
        $sql="UPDATE wines SET more_visited=more_visited+1 WHERE code='$code'";
        $stmt = $db->execute($sql);
    }
    
}