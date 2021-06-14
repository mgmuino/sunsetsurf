<?php
//Case que realiza la conexion a la base de datos
class Conexion {

    private static $dbName = 'sunsetsurf';
    private static $dbHost = '127.0.0.1';
    private static $dbPort = '3306';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $cont = null;

    public function __construct() {
        die('Esta funcionalidad no está disponible.');
    }
    //Metodo que realiza la conexion
    public static function connect() {
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=" . self::$dbHost . ";port=" . self::$dbPort . ";dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }
    //Metodo para desconectarse
    public static function disconnect() {
        self::$cont = null;
    }

}
