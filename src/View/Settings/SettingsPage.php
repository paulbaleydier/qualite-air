<?php

namespace View\Settings;

use Entity\Utilisateur;
use View\View;
use Others\dependency\Dependency;
use Others\dependency\DepEnum;

class SettingsPage extends View
{

    public function __construct()
    {
        self::$dependency = Dependency::loadDependency(array(DepEnum::DATATABLESJS, DepEnum::SWEATALERT2), get_class());
    }

    public function contentBody()
    {
?>
        <div class="card shadow p-3 card-format">
            <div class="card-body">
                <h1>Paramètres</h1>
            </div>
        </div>
        <div class="card shadow p-3 card-format">
            <div class="card-body">
                <ul class="nav nav-tabs">
                    <!-- Paramètres de l'utilisateur -->
                    <?php if (Utilisateur::hasPermission(Utilisateur::USER)) { ?>

                        <li class="nav-item">
                            <a class="nav-link active fs-4" data-bs-toggle="tab" data-bs-target="#userSettings" type="button" role="tab" aria-controls="userSettings" aria-selected="true">Gestion de l'utilisateur</a>
                        </li>

                    <?php } ?>

                    <!-- Paramètres des l'utilisateurs -->
                    <?php if (Utilisateur::hasPermission(Utilisateur::ADMIN)) { ?>

                        <li class="nav-item">
                            <a class="nav-link fs-4" data-bs-toggle="tab" data-bs-target="#userList" type="button" role="tab" aria-controls="userList" aria-selected="false">Gestion des utilisateurs</a>
                        </li>

                    <?php } ?>

                    <!-- Paramètres des permissions -->

                    <?php if (Utilisateur::hasPermission(Utilisateur::ADMIN)) { ?>

                        <li class="nav-item">
                            <a class="nav-link  fs-4" data-bs-toggle="tab" data-bs-target="#userPerm" type="button" role="tab" aria-controls="userPerm" aria-selected="false">Gestion des permissions</a>
                        </li>

                    <?php } ?>

                </ul>
                <div class="tab-content">

                    <!-- Paramètres de l'utilisateur -->
                    <?php if (Utilisateur::hasPermission(Utilisateur::USER)) { ?>
                        <div class="mt-2 tab-pane fade show active" id="userSettings" role="tabpanel" aria-labelledby="userSettings-tab">

                            <div class="card mt-3">
                                <div class="card-header text-center">
                                    <div>Modification de l'utilisateur</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <div class="form-group">
                                                <label for="nom" class="form-label">Nom :</label>
                                                <input type="text" class="form-control" id="nom" name="nom" data-update="nom">
                                            </div>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <div class="form-group">
                                                <label for="prenom" class="form-label">Prenom</label>
                                                <input type="text" class="form-control" id="prenom" name="prenom" data-update="prenom">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Adresse Mail :</label>
                                                <input type="email" class="form-control" id="email" name="email" data-update="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="permission" class="form-label">Permissions :</label>
                                                <input type="number" class="form-control" id="permission" name="permission" disabled readonly>
                                            </div>
                                        </div>

                                        <div class="col-6 d-flex align-items-end justify-content-around">
                                            <button class="ml-2 btn btn-primary" id="reset-password">Réinitialiser le mots de passe</button>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    <?php } ?>

                    <!-- Paramètres des l'utilisateurs -->

                    <?php if (Utilisateur::hasPermission(Utilisateur::ADMIN)) { ?>

                        <div class="mt-2 tab-pane fade" id="userList" role="tabpanel" aria-labelledby="userList-tab">
                            <a class="btn btn-primary float-start p-2" href="index.php?controller=Utilisateur&view=CRUD">Création d'un utilisateur</a>
                            <table class="table" id="DT_UserList" style="margin-top: 1rem;"></table>

                        </div>
                    <?php } ?>

                    <!-- Paramètres des permissions -->

                    <?php if (Utilisateur::hasPermission(Utilisateur::ADMIN)) { ?>

                        <div class="tab-pane fade" id="userPerm" role="tabpanel" aria-labelledby="userPerm-tab">

                            <table class="table" id="DT_PermManage" style="margin-top: 1rem;"></table>

                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

<?php

    }
}
