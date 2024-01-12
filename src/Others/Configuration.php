<?php
namespace Others;

use Controller\Controller;
use Entity\Entity;
use Model\Model;
use Dotenv\Dotenv;
use Model\Test;

class Configuration {

    private static $dotenv;
   
    public static function init() {

        // Immplemantation du .env 
        self::$dotenv = Dotenv::createImmutable(dirname(dirname(__DIR__)));
        self::$dotenv->load();

        echo Test::test();

    }

    public static function get(string $path) {
        return $_ENV[$path] ?? "";
    }
}

?>