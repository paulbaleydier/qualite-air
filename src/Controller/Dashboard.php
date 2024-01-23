<?php
namespace Controller;

use DateInterval;
use DateTime;
use Entity\AnalysisCo as EntityAnalysisCo;
use Model\Analysis\AnalysisCo;
use Others\Reponse;

class Dashboard extends Controller {


    public function test() {
        Reponse::create(Reponse::OK, AnalysisCo::getAll("value, timestamp"))->sendJson();
    }


}