<?php
namespace View\Authentification;

use Others\dependency\Dependency;
use View\View;

class ResetMDP extends View {
    
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
        <div class="container-wrapper ">
            <div class="card shadow-lg ">
                <div class="card-header text-center">
                    <h2>Authentification</h2>
                </div>
                <div class="card-body">

                    <form id="form-connexion">
                        <!--<div class="mb-3">
                            <label for="password_old" class="form-label">Ancien mot de passe :</label>
                            <input type="password" class="form-control collect" id="password_old" name="password_old" required>
                        </div>-->
                        <div class="mb-3">
                            <label for="password_new" class="form-label">Nouveau mot de passe :</label>
                            <input type="password" class="form-control collect" id="password_new" name="password_new" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Confirmation du mot de passe :</label>
                            <input type="password" class="form-control collect" id="password_confirm" name="password_confirm" required>
                        </div>
                    </form>
                    <button class="btn btn-primary" id="btn-connexion">Changer le mots de passe </button>
                    <div class="alert alert-danger mt-2" role="alert" id="connexion-fail" style="display: none;">
                        <!-- Attention, vous avez commis une erreur sur l'ancien mot de passe ! -->
                    </div>
                </div>
            </div>
        </div>


<?php
    }
}