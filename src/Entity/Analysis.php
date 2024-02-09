<?php
namespace Entity;

use Model\AnalysisType;

class Analysis extends Entity {

    public int|null $id;
    public int|null $type;
    public float|null $value;
    public string|null $ts;
 
    public object|null $analysis_type;

    public function __construct(array $data = array()) {
        parent::__construct($data);
        if ( isset($this->ts) ) {
            $this->ts = date("d/m/Y H:i:s", strtotime($this->ts));
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
    
}