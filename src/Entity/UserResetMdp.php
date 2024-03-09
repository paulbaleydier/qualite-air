<?php
namespace Entity;

class UserResetMdp extends Entity {

    public int|null $id;
    public int|null $userID;
    public string|null $token;
    public int|null $useToken;
    public int|string $ts;

    public function __construct(array $data) {
        parent::__construct($data);

        if (!isset($this->token)) {
            $this->token = bin2hex(random_bytes(32));
        } 
    }

}