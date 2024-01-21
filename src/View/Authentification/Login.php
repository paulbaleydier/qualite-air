<?php

namespace View\Authentification;

use Others\dependency\Dependency;
use Others\dependency\DepEnum;
use View\View;

class Login extends View
{

    public function __construct()
    {
        self::$dependency = Dependency::loadDependency(array(DepEnum::SWEATALERT2), get_class());
        self::$header = false;
        self::$footer = false;
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
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse Mail :</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mots de passe :</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="">
                        </div>
                    </form>
                    <button class="btn btn-primary" id="btn-connexion">Connexion</button>

                    <div class="alert alert-danger mt-2" role="alert" id="connexion-fail" style="display: none;">
                        Veuillez vérifier vos informations d'identification et réessayer
                    </div>
                </div>
            </div>
        </div>


<?php
    }
}
