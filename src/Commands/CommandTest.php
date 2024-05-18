<?php
use Model\AnalysisAlerts;
use Entity\AnalysisAlerts as AlertsEntity;
use Entity\AnalysisAlertsTreat;

class CommandTest {


    public static function sendAlerts() {
        $alert = new AlertsEntity(array("typeID" => 1, "value" => 100));
        AnalysisAlerts::insertObject($alert);
       
    }


}

