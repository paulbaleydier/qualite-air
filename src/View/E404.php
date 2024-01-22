<?php
namespace View;

use Others\dependency\DepEnum;
use Others\dependency\Dependency;
use View\View;

class E404 extends View {

    public function __construct() {
        self::$dependency = Dependency::loadDependency(array(), get_class());
        self::$header = true;
        self::$footer = false; 
    }


    public function contentBody() {
        ?>
        <div class="container h-100 d-flex ">
            <h1 class="text-center">404 !</h1>        
        </div>
        <?php
    }
}

?>