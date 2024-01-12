<?php
namespace Model;

use Others\Configuration as Config;
use PDO;
use PDOException;

class Model {
    protected static $table = "default";
    protected static $database;

    private static $pdo;

    private static function connect()
    {
        $host = Config::get("DB_HOST");
        self::$database = Config::get("DB_DATABASE");
        $username = Config::get("DB_USERNAME");
        $password = Config::get("DB_PASSWORD");

        try {
            self::$pdo = new PDO('mysql:host=' . $host . ';dbname=' . self::$database, $username, $password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        return self::$pdo;
    }
    
    protected static function getPDO() {
        return self::$pdo ?? self::connect();
    }

   


}

?>