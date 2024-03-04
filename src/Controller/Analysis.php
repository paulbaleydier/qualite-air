<?php
namespace Controller;

use Model\Analysis as ModelAnalysis;
use Model\AnalysisType;
use Others\Reponse;

class Analysis extends Controller {


    public function actionDefault(){
        
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

}