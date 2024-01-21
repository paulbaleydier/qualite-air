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

 

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

}