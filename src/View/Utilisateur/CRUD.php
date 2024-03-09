<?php

namespace View\Utilisateur;

use Others\dependency\Dependency;
use Others\dependency\DepEnum;
use View\View;

class CRUD extends View
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
                <div class="card shadow p-3" id="card-crud-user">
                    <div class="card-header text-center">
                        <h2 class="p-2">Modification de l'utilisateur</h2>
                    </div>
                    <div class="card-body shadow p-3">

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="nom" class="form-label">Nom :</label>
                                <input type="text" class="form-control" id="nom" name="nom" data-update="nom">
                            </div>

                            <div class="col-6 mb-3">
                                <label for="prenom" class="form-label">Prenom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" data-update="prenom">
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label for="email" class="form-label">Adresse Mail :</label>
                                <input type="email" class="form-control" id="email" name="email" data-update="email">
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <label for="permission" class="form-label">Permissions :</label>
                                <input type="number" class="form-control" id="permission" name="permission" data-update="permission">
                            </div>

                            <div class="col-6 d-flex align-items-end justify-content-around">
                                <button class="ml-2 btn btn-primary" id="reset-password">Réinitialiser le mots de passe</button>
                            </div>

                        </div>


                    </div>

                    <div class="card-footer">
                        <!-- Update -->
                        <?php if (isset($_GET["id"])) { ?>
                            <div class="p-2 d-flex justify-content-around">
                                <button class="btn btn-danger" id="btn-delete-account"><i class="fa-solid fa-xmark me-2"></i>Supprimer le compte</button>
                                <button class="btn btn-success" id="btn-save-account"><i class="fa-solid fa-check me-2"></i> Sauvegarder</button>
                            </div>
                        <?php } else { ?>
                            <!-- Create -->
                            <div class="p-2 d-flex justify-content-around">
                                <button class="btn btn-danger" onClick="history.back();"><i class="fa-solid fa-xmark me-2"></i> Annuler</button>
                                <button class="btn btn-success" id="btn-create-account"><i class="fa-solid fa-check me-2"></i> Sauvegarder</button>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>



    <?php
    }

    protected function script()
    {
    ?>
        <script>
            var dataLoad = <?php echo json_encode(static::$controller::$dataLoaded); ?>;
        </script>
<?php
    }
}
