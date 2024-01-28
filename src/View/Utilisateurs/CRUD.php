<?php

namespace View\Utilisateurs;

use Others\dependency\Dependency;
use Others\dependency\DepEnum;
use View\View;

class CRUD extends View
{

    public function __construct()
    {
        self::$dependency = Dependency::loadDependency(array(DepEnum::SWEATALERT2), get_class());
    }

    public function contentBody()
    {
?>

        <div class="card shadow p-3" id="card-crud-user">
            <div class="card-header text-center">
                <h2 class="p-2">Modification de l'utilisateur</h2>
            </div>
            <div class="card-body shadow p-3">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>

                    <div class="col-6 mb-3">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom">
                    </div>


                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="email" class="form-label">Adresse Mail :</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>

                <div class="row">

                    <div class="col-6">
                        <label for="permission" class="form-label">Permissions :</label>
                        <input type="number" class="form-control" id="permission" name="permission">
                    </div>

                    <div class="col-6 d-flex align-items-end justify-content-around">
                        <button class="ml-2 btn btn-primary" id="reset-password">Réinitialiser le mots de passe</button>
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
