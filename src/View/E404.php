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

        <div class="container text-center">
            <h1 class="display-1 mt-5">404</h1>
            <p class="lead">Désolé, la page que vous cherchez n'existe pas.</p>
            <a href="/" class="btn btn-primary">Retour à l'accueil</a>
        </div>
<?php
    }
}

?>