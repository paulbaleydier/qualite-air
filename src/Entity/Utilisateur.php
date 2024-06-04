<?php
namespace Entity;

use Model\Utilisateur as ManagerUser;

class Utilisateur extends Entity  {

    public int|null $id;
    public string|null $nom;
    public string|null $prenom;
    public string|null $email;
    public string|null $password;
    public int|null $permission;
    public string|null $google_id;
    public string|null $createdDate;

    public string|null $_cache;

    // Enumérations permissions
    const DEV = 2;
    const ADMIN = 1;
    const USER = 2;

    function __construct(array $data = array()) {
        parent::__construct($data);
    }

    public static function saveCache() {
        if (  isset($_SESSION["_cache"])) {
            if ( session_status() === PHP_SESSION_ACTIVE ) {
                ManagerUser::update($_SESSION["id"], array("_cache" => json_encode($_SESSION["_cache"])));
            }
        }
    }


    
    public static function hasPermission(int $perm): bool {
        if ( isset($_SESSION["permission"]) ){
            return $_SESSION["permission"] >= $perm;
        }
        return false;
    }

    public static function getID() {
        return $_SESSION["id"];
    }

}