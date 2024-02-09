<?php
namespace Controller;

use Model\AnalysisType;
use Model\Analysis;
use Model\Utilisateur;
use Others\Reponse;

class Dashboard extends Controller {


    public function test() {
        Reponse::create(Reponse::OK, Analysis::getAll("value, ts"))->sendJson();
    }

    public function debug() {
        echo "<pre>";
        echo "</br> Analysis : ";
        var_dump(Analysis::getAll());
        echo "</br> AnalysisType : ";
        var_dump(AnalysisType::getAll());
        echo "</br> Utilisateurs : ";
        var_dump(Utilisateur::getAll());
        echo "</br>";
        die();
    }


}