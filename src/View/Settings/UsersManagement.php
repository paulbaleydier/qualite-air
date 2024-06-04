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
                <div class="content-fluid">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="card">
                                <div class="card-header row">
                                    <div class="col-md-6">
                                        <h1 class="text-left mt-2">Gestion des utilisateurs</h1>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center justify-content-end">
                                        <a href="index.php?controller=Utilisateur&view=CRUD&id=-1"
                                            class="btn btn-primary">Création d'un utilisateur</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table" id="DT_UserList"></table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <?php
    }
}
