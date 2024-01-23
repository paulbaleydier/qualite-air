<?php
namespace Entity;

class AnalysisCo extends Entity {

    public int|null $id;
    public float|null $value;
    public string|null $timestamp;
 

    public function __construct(array $data = array()) {
        parent::__construct($data);
        if ( isset($this->timestamp) ) {
            $this->timestamp = date("d/m/Y H:i:s", strtotime($this->timestamp));
        }
    }

    public function getDate(): string {
        if ( isset(self::$timestamp) ) {
            return date("d/m/Y H:i:s", strtotime(self::$timestamp));
        }
        return "??";
    }
    
}