<?php
class Singleton {
    private static $uniqueinstance = null;
    private function __construct()
    {}

    public static function getinstance() {
        if (@self::$uniqueinstance == null) {
            //Create a unique instance in case none exists
            require 'connect.php';
            self::$uniqueinstance = new mysqli($host, $dbUser, $dbPass, $dbName);
        }
        return self::$uniqueinstance;
    }
}
?>