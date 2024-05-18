<?php
namespace Controller;

use Entity\Utilisateur;
use Model\Analysis as ModelAnalysis;
use Model\AnalysisAlerts;
use Model\AnalysisAlertsTreat;
use Entity\AnalysisAlertsTreat as AlertsTreatEntity;
use Model\AnalysisType;
use Others\Reponse;

class Analysis extends Controller {


    public function actionDefault(){
        parent::actionDefault();
    }

    public function dtAnalysisType() {
        Reponse::create(Reponse::OK, AnalysisType::getAll())->sendJson();
    }

    public function updateField() {
        if ( !filter_has_var(INPUT_POST, "id") && !filter_has_var(INPUT_POST, "field") && !filter_has_var(INPUT_POST, "value")) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();

        }

        $id = filter_input(INPUT_POST,"id");
        $field = filter_input(INPUT_POST,"field");
        $value = filter_input(INPUT_POST,"value");

        AnalysisType::update($id, array($field => $value));

    
        
        Reponse::create(Reponse::OK, "ok")->sendJson();
        
    }

    public function getAlerts() {
        $alerts = AnalysisAlerts::getAlertsForUser(Utilisateur::getID());
        Reponse::create(Reponse::OK, $alerts)->sendJson();
    }

    public function treatAlert(){
        if ( !filter_has_var(INPUT_POST, "id")) {
            Reponse::create(Reponse::ERROR, "Paramètre incorrect.")->sendJson();

        }

        $id = filter_input(INPUT_POST, "id");

        AnalysisAlertsTreat::insertObject(new AlertsTreatEntity(array("userID" => Utilisateur::getID(), "alertID" => $id)));

        Reponse::create(Reponse::OK, "ok")->sendJson();

    }

    public function alertsHistory() {
        Reponse::create(Reponse::OK, AnalysisAlerts::getAlertsHistory())->sendJson();
    }

}