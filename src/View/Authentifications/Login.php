<?php
namespace View\Authentifications;

use Others\dependency\Dependency;
use View\View;

class Login extends View {

    public function __construct() {
        self::$dependency = Dependency::loadDependency(array(), get_class());
    }

    public function contentBody() {
        ?>
            <h1>Authentifications</h1>
        <?php
    }

}