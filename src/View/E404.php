<?php

namespace View;

use Others\dependency\DepEnum;
use Others\dependency\Dependency;
use View\View;

class E404 extends View
{

    public function __construct()
    {
        parent::__construct(false);
        self::$dependency = Dependency::loadDependency(array(), get_class());
        self::$header = false;
        self::$footer = false;
        self::$sideBar = false;
    }


    public function contentBody()
    {
?>
        <h1 class="text-center">404 !</h1>

<?php
    }
}

?>