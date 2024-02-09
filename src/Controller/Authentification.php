<?php

namespace Controller;

use Model\Utilisateur;
use Others\Authentification as OthersAuthentification;
use Others\Reponse;

class Authentification extends Controller {
 
    public function actionDefault() {
        parent::actionDefault();        
    }


    public function login() {
        if ( !filter_has_var(INPUT_POST, "email") && !filter_has_var(INPUT_POST, "password") ) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
          
        }

        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);
        $passHash = md5($password);

        $verifUser = Utilisateur::isExist($email, $passHash);

            
        if ($verifUser) OthersAuthentification::connectClient($verifUser);
        
        Reponse::create($verifUser ? Reponse::OK : Reponse::ERROR, null)->sendJson();

    }

    public static function logout(){
        OthersAuthentification::logout();
    }

}