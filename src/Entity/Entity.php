<?php
namespace Entity;

class Entity {


    public function __construct(array $data = array()) {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

}

?>