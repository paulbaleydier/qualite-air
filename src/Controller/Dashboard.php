<?php
namespace Controller;

use Model\AnalysisType;
use Model\Analysis;
use Model\Utilisateur;
use Others\Reponse;

class Dashboard extends Controller {


    public function test() {
        $data = Analysis::getAll("type, value, ts");
        $finalData = array();

        foreach ( $data as $value ) {
            $finalData[$value->type][] = $value;
        }

        // var_dump($finalData);die();

        Reponse::create(Reponse::OK, $finalData)->sendJson();
    }

    public function getUsualGas() {
        Reponse::create(Reponse::OK, Analysis::getDataChart("1,2,3"))->sendJson();
    }

    public function getBlendOrganic() {
        Reponse::create(Reponse::OK, Analysis::getDataChart("4,5,6"))->sendJson();
    }

    public function getFineParticles() {
        Reponse::create(Reponse::OK, Analysis::getDataChart("7,8"))->sendJson();
    }

    public function debug() {
        echo "<pre>";
        echo "</br> Analysis (Gaz usuel) : ";
        var_dump(Analysis::getDataChart("1,2,3"));
        echo "</br> Analysis (Composés organiques) : ";
        var_dump(Analysis::getDataChart("4,5,6"));
        echo "</br> Analysis (Particules fines) : ";
        var_dump(Analysis::getDataChart("7,8"));
        // echo "</br> AnalysisType : ";
        // var_dump(AnalysisType::getAll());
        // echo "</br> Utilisateurs : ";
        // var_dump(Utilisateur::getAll());
        // echo "</br>";
        die();
    }


}