<?php
require ('../vendor/autoload.php');

use Others\Configuration;


try {
    Configuration::init();
}catch (Exception $e) {
    echo "". $e->getMessage() ."";
}


?>