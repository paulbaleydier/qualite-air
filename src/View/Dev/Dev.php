<?php

namespace View\Dev;

use Others\dependency\Dependency;
use Others\dependency\DepEnum;
use View\View;

class Dev extends View
{


    public function __construct()
    {
        parent::__construct();
        self::$dependency = Dependency::loadDependency(array(DepEnum::SWEATALERT2), get_class());
    }

    public function contentBody()
    {
?>
        <div class="content-wrapper">
            <div class="content">
                <!-- Button trigger modal -->
                <div class="content-fluid">
                    <div class="d-flex justify-content-center align-items-center" style="min-height:75vh;">
                        <div class="card shadow-lg" id="card-crud-user" style="width: 40rem;">
                            <div class="card-header text-center">
                                <h2 class="font-weight-bold"><u>Modification de l'utilisateur </u></h2>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="nom" class="form-label">Nom :</label>
                                        <input type="text" class="form-control" id="nom" name="nom" data-update="nom">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="prenom" class="form-label">Prenom :</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom" data-update="prenom">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="email" class="form-label">Adresse Mail :</label>
                                        <input type="email" class="form-control" id="email" name="email" data-update="email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="permission" class="form-label">Permissions :</label>
                                        <div class="form-group">
                                            <select class="custom-select" name="permission" id="permission" data-update="permission">
                                                <option value="1">Administrateur</option>
                                                <option value="2">Utilisateur</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer" style="border-top: 1px solid rgba(0,0,0,.125);">
                                <!-- Update -->
                                <?php if (isset($_GET["id"])) { ?>
                                    <div class="row">
                                        <div class="col d-flex justify-content-begin">
                                            <button class="btn btn-primary" id="reset-password">Réinitialiser le mots de passe</button>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-danger mr-2" id="btn-delete-account"><i class="fa-solid fa-xmark me-2"></i>Supprimer le compte</button>
                                            <button class="btn btn-success" id="btn-save-account"><i class="fa-solid fa-check me-2"></i> Sauvegarder</button>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <!-- Create -->
                                    <div class="row">
                                        <div class="col d-flex justify-content-begin">
                                            <button class="btn btn-primary" id="reset-password">Réinitialiser le mots de passe</button>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-danger mr-2" onClick="history.back();"><i class="fa-solid fa-xmark me-2"></i> Annuler</button>
                                            <button class="btn btn-success" id="btn-create-account"><i class="fa-solid fa-check me-2"></i> Sauvegarder</button>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
