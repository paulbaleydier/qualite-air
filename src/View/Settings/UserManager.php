<?php

namespace View\Settings;

use View\View;
use Others\dependency\Dependency;
use Others\dependency\DepEnum;

class UserManager extends View
{


    public function __construct()
    {
        self::$dependency = Dependency::loadDependency(array(), get_class());
    }

    public function contentBody()
    {
?>

        <div class="content-wrapper">
            <div class="content">
                <div class="card m-2" style="top: 1rem;">
                    <h1 class="text-center mt-2">Gestion utilisateur</h1>
                    <div class="card-body">
                        A faire...
                    </div>

                </div>


            </div>

        </div>
<?php
    }
}
