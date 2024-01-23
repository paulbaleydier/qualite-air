<?php

namespace Controller;

use Model\Utilisateur\Utilisateur;
use Others\Reponse;

class Utilisateurs extends Controller {
 
    public function actionDefault() {
        // Reponse::create(Reponse::OK, ["tes" => "dsds" ])->sendJson();
        
    }

    public function dataTable() {
        Reponse::create(Reponse::OK, Utilisateur::getAll())->sendJson();
    }

}