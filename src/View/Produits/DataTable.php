<?php
namespace View\Produits;

use Others\dependency\Dependency;
use View\View;

class DataTable extends View {

    public function __construct() {
        self::$dependency = Dependency::loadDependency(array(), get_class());
    }

    public function contentBody() {
        ?>
            <h1>Produits</h1>

        <?php
    }
}