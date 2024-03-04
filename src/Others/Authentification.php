<?php

namespace Others;

class Authentification
{



    function __construct()
    {
        session_set_cookie_params(3600);
        session_start();
    }


    public static function redirectionLogin($accessLogin)
    {
        /*
        $urlBypass = array(
            "controller=Authentification&view=Login",
            "controller=Authentification&action=login",
            "index.php?controller=Authentification&action=ResetMDP",
            "index.php?controller=Authentification&view=ResetMDP"
        );
        */
        if (!isset($_GET["controller"])) {
            header('Location: ./index.php?controller=Dashboard&view=Dashboard');
            exit;
        }

        if ($accessLogin == true && !self::isLoggedIn()) {
            header('Location: ./index.php?controller=Authentification&view=Login');
            exit;
        }
    }


    public static function connectClient(array $data)
    {
        foreach ($data as $key => $value) {
            if ($key !== "password") $_SESSION[$key] = $value;
        }
    }

    public static function logout()
    {
        $_SESSION[] = array();
        foreach ($_COOKIE as $key => $value) {
            setcookie($key, '', time() - 3600, '/');
        }

        session_destroy();
        header('Location: ./index.php?controller=Authentification&view=Login');
        exit;
    }



    public static function isLoggedIn()
    {
        return isset($_SESSION['id']);
    }
}
