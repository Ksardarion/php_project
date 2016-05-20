<?php
class ExceptionPdoNotExists extends Exception {

}
class DB {
    static protected
        $pdo,
        $host,
        $user,
        $password,
        $db_name;

    static public function connect(){
        if (!class_exists('pdo') || array_search('mysql', PDO::getAvailableDrivers()) === false)
            throw new ExceptionPdoNotExists("PDO driver are not installed");
        $args = func_get_args();
        if (count($args) == 4) {
            self::$host = $args[0];
            self::$db_name = $args[1];
            self::$user = $args[2];
            self::$password = $args[3];
        }
        if (is_null(self::$pdo)) {
            if (!self::$db_name) {
                throw new Exception('Please setting connection properties');
            }
            self::$pdo = new PDO("mysql:host=".self::$host.";port=3306;dbname=".self::$db_name, self::$user, self::$password);
            // set the PDO error mode to exception
            self::$pdo->setAttribute(PDO::  ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            self::$pdo->query("SET NAMES utf8;");
        }
        return self::$pdo;
    }
    static public function isConnected(){
        return !is_null(self::$pdo);
    }
    protected function __construct(){

    }
}
?>