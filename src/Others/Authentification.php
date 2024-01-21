<?php
namespace Others;

class Authentification {

    function __construct() {
        session_start();
    }

    public function init() {

        if (!$this->isLoggedIn()) {
            if ( $_SERVER["QUERY_STRING"] !== "controller=Authentification&view=Login" && $_SERVER["QUERY_STRING"] !== "controller=Authentification&action=login") {
                header('Location: ./index.php?controller=Authentification&view=Login');
                exit;
            }
        }
    }

    public static function connectClient(array $data) {
        foreach ( $data as $key => $value ) {
            if ($key !== "password") $_SESSION[$key] = $value;
        }
    }

    public static function logout() {
        $_SESSION[] = array();
        session_destroy();
        header('Location: ./index.php?controller=Authentification&view=Login');
        exit;
    }

 

    public function isLoggedIn() {
        return isset($_SESSION['id']);
    }

}