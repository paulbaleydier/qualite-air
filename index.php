<?php
require ('vendor/autoload.php');

use Others\Authentification;
use Others\Configuration;
use Entity\Mail;

error_reporting(E_ALL);

ini_set('display_errors', 1);

ini_set('log_errors', 1);
ini_set('error_log', (dirname(__DIR__)) . '/log/erreurs.log');
date_default_timezone_set('Europe/Paris');




new Authentification();

try {
    Configuration::init();
    Configuration::renderPage();
}catch (Exception $e) {
    echo $e->getMessage();
    exit();
}


?>