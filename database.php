<?php

class Database {
    // below are not the real passwords
    // do not put real passwords in a directory that is pushed to GitHub! 
    // for real passwords, see file in ../database subdirectory
    private static $dbName = 'not_real';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'not_real';
    private static $dbUserPassword = 'not_real';
    private static $cont = null;

    public function __construct() {
        exit('Init function is not allowed');
    }

    public static function connect() {
        // One connection through whole application
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect() {
        self::$cont = null;
    }
}
?>
