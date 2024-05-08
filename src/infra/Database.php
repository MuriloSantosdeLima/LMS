<?php

class Database {
    private static $instancia = null;
    private static $url = "mysql:host=localhost:3306;dbname=lmsvolks";
    private static $username = "root";
    private static $password = "";
    private static $options = [];

    public static function getInstancia() {
        try {

            if (!isset(self::$instancia)) {
                self::$instancia = new PDO(self::$url,self::$username,self::$password,self::$options);
            }

            return self::$instancia;

        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}



?>