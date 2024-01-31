<?php

namespace Controller;

use Entity\Utilisateur as EntityUtilisateur;
use Model\Utilisateur\Utilisateur as ModelUser;
use Others\Reponse;

class Utilisateur extends Controller {
 
    public function actionDefault() {
        // Reponse::create(Reponse::OK, ["tes" => "dsds" ])->sendJson();
        switch(static::getView()) {
            case "CRUD": 
                if ( isset($_GET["id"]) ){
                    $id = $_GET["id"];
                    static::$dataLoaded = ModelUser::getByID($id);
                }
                break;
            
            default: break;
        }

    }

    public function dataTable() {
        Reponse::create(Reponse::OK, ModelUser::getAll())->sendJson();
    }

    public function deleteUser() {
        if ( !filter_has_var(INPUT_POST, "id") ) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }

        $id = filter_input(INPUT_POST, "id");

        ModelUser::delete($id);

        Reponse::create(Reponse::OK, $id)->sendJson();

    }

    public function resetPassword() {
        if ( !filter_has_var(INPUT_POST, "id") ) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }

        $id = filter_input(INPUT_POST, "id");

        Reponse::create(Reponse::OK, $id)->sendJson();

    }

    public function updateUser() {
        if ( !filter_has_var(INPUT_POST, "data") && !filter_has_var(INPUT_POST, "id") ) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }

        $id = filter_input(INPUT_POST, "id");
        $data = filter_input(INPUT_POST, "data");
        $dataParse = json_decode($data, true);

        ModelUser::update($id, $dataParse);

        Reponse::create(Reponse::OK, "ok")->sendJson();

    }

    public function createUser() {
        if ( !filter_has_var(INPUT_POST, "data") ) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }

        $data = filter_input(INPUT_POST, "data");
        $dataParse = json_decode($data, true);

        ModelUser::insertObject(new EntityUtilisateur($dataParse));

        Reponse::create(Reponse::OK, "ok")->sendJson();

    }

}