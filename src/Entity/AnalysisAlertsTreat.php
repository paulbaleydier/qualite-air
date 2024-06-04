<?php
namespace Entity;

use Model\AnalysisType;

class AnalysisAlertsTreat extends Entity {

    public int|null $id;
    public int|null $userID;
    public float|null $alertID;
    public string|null $ts;
 

    public function __construct(array $data = array()) {
        parent::__construct($data);
    
    }

    public function getDate(): string {
        if ( isset(self::$ts) ) {
            return date("d/m/Y H:i:s", strtotime(self::$ts));
        }
        return "??";
    }

 
}