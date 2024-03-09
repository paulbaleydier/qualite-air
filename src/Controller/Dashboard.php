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

    public function getChartData() {
        if ( !filter_has_var(INPUT_GET, "args") || !filter_has_var(INPUT_GET, "hourlySelected")) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }
        $args = filter_input(INPUT_GET, "args");
        $hourlySelected = filter_input(INPUT_GET, "hourlySelected");
        Reponse::create(Reponse::OK, Analysis::getDataChart($args, whereHourly: $hourlySelected))->sendJson();
    }

    public function getDataChartN() {
        if ( !filter_has_var(INPUT_GET, "args") || !filter_has_var(INPUT_GET, "hourlySelected")) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();
        }
        $args = filter_input(INPUT_GET, "args");
        $hourlySelected = filter_input(INPUT_GET, "hourlySelected");
        Reponse::create(Reponse::OK, Analysis::getDataChartN($args, whereHourly: $hourlySelected))->sendJson();
    }

    public function getStatsToday() {
        Reponse::create(Reponse::OK, Analysis::getStatsToday())->sendJson();
    }



    public function debug() {
        /*echo "<pre>";
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
        */
        var_dump($_SESSION);
        die();
    }


}