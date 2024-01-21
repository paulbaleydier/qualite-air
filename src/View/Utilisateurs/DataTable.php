<?php
namespace View\Utilisateurs;

use Others\dependency\Dependency;
use Others\dependency\DepEnum;
use View\View;

class DataTable extends View {

    public function __construct() {
        self::$dependency = Dependency::loadDependency(array(DepEnum::SWEATALERT2), get_class());
    }

    public function contentBody() {
        ?>
            <h1>Utilisateurs</h1>

        <?php

        var_dump($_SESSION);
    }

}