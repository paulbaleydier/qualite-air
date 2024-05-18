<?php

namespace View\Authentification;

use Others\dependency\Dependency;
use Others\dependency\DepEnum;
use View\View;

class Login extends View
{

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
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse Mail :</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mots de passe :</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                        </div>
                    </form>
                    <button class="btn btn-primary" id="btn-connexion">Connexion</button>
                    <div class="mt-2">
                        <!--
                        <div id="g_id_onload" data-client_id="47320426225-gkvnl76ie5e1c7569l3utdil4reoa113.apps.googleusercontent.com" data-context="signin" data-ux_mode="redirect" data-login_uri="https://qda.duckdns.org/webroot/index.php?controller=Authentification&action=loginWithGoogle" data-auto_prompt="false">
                        </div>

                        <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="outline" data-text="continue_with" data-size="large" data-logo_alignment="left">
                        </div>
                        -->
                        <div id="g_id_onload"
                            data-client_id="47320426225-gkvnl76ie5e1c7569l3utdil4reoa113.apps.googleusercontent.com"
                            data-context="signin"
                            data-ux_mode="popup"
                            data-login_uri="https://qda.duckdns.org/index.php?controller=Authentification&action=loginWithGoogle"
                            data-auto_select="false"
                            data-itp_support="true">
                        </div>

                        <div class="g_id_signin"
                            data-type="standard"
                            data-shape="rectangular"
                            data-theme="outline"
                            data-text="signin_with"
                            data-size="large"
                            data-logo_alignment="left">
                        </div>
                    </div>
                    <small><a id="resetMdp">Mot de passe oublié ? </a></small>
                    <div class="alert alert-danger mt-2" role="alert" id="connexion-fail" style="display: none;">
                        Veuillez vérifier vos informations d'identification et réessayer
                    </div>
                </div>
            </div>
        </div>

        <script src="https://accounts.google.com/gsi/client" async></script>

<?php
    }
}
