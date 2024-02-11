<?php
namespace Entity;

class AnalysisType extends Entity {

    public int|null $id;
    public string|null $name;
    public string|null $shortName;
    public string|null $unitType;
    public int|null $criticalValue;
 

    public function __construct(array $data = array()) {
        parent::__construct($data);
    }
    
}