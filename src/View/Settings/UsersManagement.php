<?php

namespace View\Settings;

use View\View;
use Others\dependency\Dependency;
use Others\dependency\DepEnum;

class UsersManagement extends View
{


    public function __construct()
    {
        parent::__construct();
        self::$dependency = Dependency::loadDependency(array(DepEnum::DATATABLESJS), get_class());
    }

    public function contentBody()
    {
?>

        <div class="content-wrapper">
            <div class="content">
                <div class="card m-2" style="top: 1rem;">
                    <div class="card-header row">
                        <div class="col-md-6">
                            <h1 class="text-left mt-2">Gestion des utilisateurs</h1>

                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            <a href="index.php?controller=Utilisateur&view=CRUD&id=-1" class="btn btn-primary">Création d'un utilisateur</a>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table" id="DT_UserList" style="margin-top: 1rem;"></table>

                    </div>

                </div>


            </div>

        </div>
<?php
    }
}
