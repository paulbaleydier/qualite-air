<?php

namespace Controller;

use Others\Reponse;


class Test extends Controller {
   

    public function actionDefault() {
        Reponse::create(Reponse::OK, ["tes" => "dsds" ])->sendJson();

    }

}