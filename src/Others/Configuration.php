<?php

namespace Others;

use View\E404;
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

                if (isset($_GET['action'])) {
                    $action = $_GET['action'];

                    if (method_exists($controller, $action) && is_callable([$controller, $action])) {
                        $controller->$action();
                    }
                } else {
                    $controller->actionDefault();
                }

                // Charger la vue correspondante
                $viewGet = $_GET['view'] ?? 'E404';
                $className = "View\\" . $controllerName . "\\" . $viewGet;

                if (class_exists($className)) {
                    $view = new $className();
                    $view::$controller = $controller;
                    $view->render();

                } else {
                    $view = new E404();
                    $view->render();
                }
            }else {
                $view = new E404();
                $view->render();
            }
        } else {
            $view = new E404();
            $view->render();

        }

    }

    public static function get(string $path)
    {
        return $_ENV[$path] ?? "";
    }
}
