<?php
namespace Others;

use Controller\Controller;
use Entity\Entity;
use Model\Model;
use Dotenv\Dotenv;

// use Model\Test;

class Configuration
{

    private static $dotenv;

    public static function init()
    {

        // Immplemantation du .env 
        self::$dotenv = Dotenv::createImmutable(dirname(dirname(__DIR__)));
        self::$dotenv->load();

        // echo Test::test();


    }

    public static function renderPage()
    {
        if (isset($_GET['controller'])) {
            $controllerName = $_GET['controller'];

            $className = "Controller\\" . $controllerName;

            if (class_exists($className)) {
                $controller = new $className();

                if ( isset($_GET['action']) ) {
                    $action = $_GET['action'];

                    if (method_exists($controller, $action) && is_callable([$controller, $action]) ) {
                        $controller->$action();
                    }
                }else {
                    $controller->index();
                }
               
            }
        }

        // Charger la vue correspondante
        $viewGet = isset($_GET['view']) ? $_GET['view'] : 'E404';
        $className = "View\\" . $viewGet;

        if (class_exists($className)) {
            $view = new $className();
            $view->render();
        } else {
            echo "Class not found";
        }

    }

    public static function get(string $path)
    {
        return $_ENV[$path] ?? "";
    }
}

?>