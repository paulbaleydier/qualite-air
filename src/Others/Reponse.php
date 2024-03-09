<?php

namespace Others;

class Reponse {

    const OK = 0;
    const ERROR = 1;

    protected $status;
    protected $data;

    public function __construct($status, $data) {
        $this->status = $status;
        $this->data = $data;
    }

    public function sendJson() {
        header('Content-Type: application/json');
        echo json_encode(['status' => $this->status, 'data' => $this->data]);
        die();
    }


    public static function create($status, $data) {
        return new self($status, $data);
    }
}
