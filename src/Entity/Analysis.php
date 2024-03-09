<?php
namespace Entity;

use Model\AnalysisType;

class Analysis extends Entity {

    public int|null $id;
    public int|null $type;
    public float|null $value;
    public string|null $ts;
 
    public object|null $analysis_type;
    public string|null $_date_fr;
    public string|null $_hourly;

    public function __construct(array $data = array()) {
        parent::__construct($data);
        if ( isset($this->ts) ) {
            $this->_date_fr = date("d/m/Y H:i:s", strtotime($this->ts));
            $this->_hourly = $this->getHourly();
        }
        if ( isset($this->type) ) {
            $this->analysis_type = AnalysisType::getByID($this->type) ?? array();
        }
    }

    public function getDate(): string {
        if ( isset(self::$ts) ) {
            return date("d/m/Y H:i:s", strtotime(self::$ts));
        }
        return "??";
    }
    
    public function getHourly(): string {
        if ( isset($this->ts) ) {
            return date("H:i:s", strtotime($this->ts));
        }
        return "??";
    }

 
}