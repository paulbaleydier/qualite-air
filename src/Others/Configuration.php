<?php
namespace Others;

use Controller\Controller;
use Entity\Entity;
use Model\Model;
use Dotenv\Dotenv;


class Configuration {

    private static $dotenv;
   
    public static function init() {
        echo "Hello, World !";

        // Immplemantation du .env 
        self::$dotenv = Dotenv::createImmutable(dirname(dirname(__DIR__)));
        self::$dotenv->load();

        // var_dump( self::get("DB_DATABASE")) ;
    }

    public static function get(string $path) {
        return $_ENV[$path] ?? "";
    }
}

?>