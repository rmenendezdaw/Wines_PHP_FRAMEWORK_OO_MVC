<?php
    class Conf {
        private $userdb;
        private $passdb;
        private $hostdb;
        private $db;
        static $instance;

       private function __construct() {
            $cnfg = parse_ini_file(MODEL_PATH ."db.ini");
            $this->userdb = $cnfg['user'];
            $this->passdb = $cnfg['password'];
            $this->hostdb = $cnfg['host'];
            $this->db = $cnfg['db'];
        }
        private function __clone() {

        }

        public static function getInstance() {
            if (!(self::$instance instanceof self))
                self::$instance = new self();
            return self::$instance;
        }
        public function getUserDB() {
            $var = $this->userdb;
            return $var;
        }

        public function getHostDB() {
            $var = $this->hostdb;
            return $var;
        }

        public function getPassDB() {
            $var = $this->passdb;
            return $var;
        }

        public function getDB() {
            $var = $this->db;
            return $var;
        }
    }