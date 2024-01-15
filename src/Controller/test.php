<?php

namespace Controller;

use Others\Reponse;


class Test extends Controller {
   

    public function index() {
        Reponse::create(Reponse::OK, ["tes" => "dsds" ])->sendJson();

    }

}