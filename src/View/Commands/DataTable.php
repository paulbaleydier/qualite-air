<?php

namespace View\Commands;

use Model\Commands\Commands;
use Model\Produits\Produits;
use Others\dependency\Dependency;
use View\View;

class DataTable extends View
{

    public function __construct()
    {
        self::$dependency = Dependency::loadDependency(array(), get_class());
    }

    public function contentBody()
    {
?>
        <h1>Commands Exemple (MVC) !</h1>

<?php


        // var_dump(Produits::getByID(101));

    }
}
