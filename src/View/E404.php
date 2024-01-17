<?php
namespace View;

use Others\dependency\DepEnum;
use Others\dependency\Dependency;
use View\View;

class E404 extends View {

    public function __construct() {
        self::$dependency = Dependency::loadDependency(array(DepEnum::SWEATALERT2), get_class());
    }


    public function contentBody() {
        ?>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
            <h1>Hello, world !</h1>
        <?php
    }
}

?>