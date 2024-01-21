<?php

namespace Controller;

use Model\Utilisateur\Utilisateur;
use Others\Reponse;

class Authentification extends Controller {
 
    public function actionDefault() {
        parent::actionDefault();        
    }

    /*
        TODO : Fonction pas 
    */

    public function login() {
        if ( !filter_has_var(INPUT_POST, "email") && !filter_has_var(INPUT_POST, "password") ) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
            // return;
        }

        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);
        $passHash = md5($password);

        $verifUser = Utilisateur::isExist($email, $passHash);

        Reponse::create($verifUser ? Reponse::OK : Reponse::ERROR, $verifUser)->sendJson();
    }

}