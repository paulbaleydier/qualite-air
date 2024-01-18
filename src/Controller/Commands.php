<?php

namespace Controller;

use Model\Commands\Commands as CommandsManager;
use Others\Reponse;

class Commands extends Controller {
 
    public function actionDefault() {
        // Reponse::create(Reponse::OK, CommandsManager::getByID(1001))->sendJson();
    }


    public function test() {
        Reponse::create(Reponse::ERROR, ["test" => "test test"])->sendJson();
    }

}