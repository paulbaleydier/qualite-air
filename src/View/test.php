<?php
namespace View;

use Model\User;
use Others\dependency\Dependency;
use Others\dependency\DepEnum;

class Test extends View {

    public function __construct() {
        self::$dependency = Dependency::loadDependency(array(), get_class());
    }

    public function contentBody(){
        ?>
            <h1>View TEST</h1>
        <?php
    }
}