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


    public function sendXml() {
        header('Content-Type: application/xml');
        echo $this->convertToXml(['status' => $this->status, 'data' => $this->data]);
        die();
    }


    protected function convertToXml($data) {
   
        $xml = new \SimpleXMLElement('<root/>');
        array_walk_recursive($data, array ($xml, 'addChild'));
        return $xml->asXML();
    }

    public static function create($status, $data) {
        return new self($status, $data);
    }
}
