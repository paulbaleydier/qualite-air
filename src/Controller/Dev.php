<?php
namespace Controller;

use Entity\Utilisateur;
use Model\AnalysisAlerts;
use Others\Reponse;


class Dev extends Controller {

    public function actionDefault() {
        //$_SESSION["_cache"]["darkTheme"] = false;
        //\Entity\Utilisateur::saveCache();
        
        // var_dump($_SESSION);die();
        // ManagerUser::test();
        //die();
        // $alerts = AnalysisAlerts::getAlertsForUser(Utilisateur::getID());
        // Reponse::create(Reponse::OK, $alerts)->sendJson();
        
    }

    public function index() {}

}