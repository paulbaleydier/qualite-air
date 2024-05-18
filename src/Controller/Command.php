<?php

namespace Controller;

use Model\Analysis as AnalysisModel;
use Entity\Analysis as AnalysisEntity;

class Command extends Controller
{
    public static function sendData() {
        AnalysisModel::insertObject(new AnalysisEntity([""]));
    }

}