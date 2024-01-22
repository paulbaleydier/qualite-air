<?php
namespace Controller;

use Model\Utilisateur\Utilisateur;

class Settings extends Controller {


    public function actionDefault(){
        
    }

    public function userDataTable(){
        $users = Utilisateur::getAll();

        var_dump($users);
    }

}