<?php
namespace Controller;

use Model\Utilisateur as ModelUtilisateur;

class Settings extends Controller {


    public function actionDefault(){
        
    }

    public function userDataTable(){
        $users = ModelUtilisateur::getAll();

    }

}