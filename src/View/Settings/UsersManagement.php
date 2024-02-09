<?php

namespace View\Settings;

use View\View;
use Others\dependency\Dependency;
use Others\dependency\DepEnum;

class UsersManagement extends View
{


    public function __construct()
    {
        self::$dependency = Dependency::loadDependency(array(DepEnum::DATATABLESJS, DepEnum::SWEATALERT2), get_class());
    }

    public function contentBody()
    {
?>

        <div class="content-wrapper">
            <div class="content">
                <div class="card m-2" style="top: 1rem;">
                    <h1 class="text-center mt-2">Gestion des utilisateurs</h1>
                    <div class="card-body">
                        <table class="table" id="DT_UserList" style="margin-top: 1rem;"></table>

                    </div>

                </div>


            </div>

        </div>
<?php
    }
}
