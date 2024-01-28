<?php

namespace Controller;

use Model\Utilisateur\Utilisateur;
use Others\Reponse;

class Utilisateurs extends Controller {
 
    public function actionDefault() {
        // Reponse::create(Reponse::OK, ["tes" => "dsds" ])->sendJson();
        switch(static::getView()) {
            case "CRUD": 
                if ( isset($_GET["id"]) ){
                    $id = $_GET["id"];
                    static::$dataLoaded = Utilisateur::getByID($id);
                }
                break;
            
            default: break;
        }

        // var_dump();die();
    }

    public function dataTable() {
        Reponse::create(Reponse::OK, Utilisateur::getAll())->sendJson();
    }

    public function deleteUser() {
        if ( !filter_has_var(INPUT_POST, "id") ) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }

        $id = filter_input(INPUT_POST, "id");

        Utilisateur::delete($id);

        Reponse::create(Reponse::OK, $id)->sendJson();

    }

    public function resetPassword() {
        if ( !filter_has_var(INPUT_POST, "id") ) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }

        $id = filter_input(INPUT_POST, "id");

        Reponse::create(Reponse::OK, $id)->sendJson();

    }

}