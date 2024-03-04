<?php 
namespace Model;

use PDO;

use Model\Model;

class Utilisateur extends Model {

    protected static $table = "utilisateurs"; 
    protected static $id = "id";


    public static function isExist($email, $password) {
        $model = self::getInstance();

        $sql = "SELECT 
                    *
                FROM " . static::$table . " as u
                WHERE 
                    u.email = :email AND
                    u.password = :password AND
                    u.google_id IS NULL
        ";

        $req = $model->prepare($sql);
        
        $req->bindParam(':email', $email, PDO::PARAM_STR);
        $req->bindParam(':password', $password, PDO::PARAM_STR);

        $req->execute();
 
        return $req->rowCount() >= 1 ? $req->fetch(PDO::FETCH_ASSOC) : false;
    }

    public static function isExistGoogle($google_id) {
        $model = self::getInstance();

        $sql = "SELECT 
                    *
                FROM " . static::$table . " as u
                WHERE 
                    u.google_id = :google_id
        ";

        $req = $model->prepare($sql);
        
        $req->bindParam(':google_id', $google_id, PDO::PARAM_STR);

        $req->execute();
 
        return $req->rowCount() >= 1 ? $req->fetch(PDO::FETCH_ASSOC) : false;
    }

    public static function goodMdpWithId($id, $password) {
        $model = static::getInstance();
        $password_hash = md5($password);


        $sql = "
                SELECT 
                    *
                FROM " . static::$table . " as u
                WHERE 
                    u.id = '$id' AND
                    u.password = '$password_hash' AND
                    u.google_id IS NULL
        ";

        $req = $model->prepare($sql);
        

        $req->execute();
 
        return $req->rowCount() >= 1 ;
    }

    public static function getByEmail($email){
        $model = self::getInstance();

        $sql = "SELECT
                    *
                FROM ". self::$table ." as u
                WHERE
                    u.email = :email AND
                    u.google_id IS NULL";

        $req = $model->prepare($sql);

        $req->bindValue(":email", $email, PDO::PARAM_STR);

        $req->execute();

        if ($req->rowCount() >= 1) {
            $entity = $req->fetchObject(\Entity\Utilisateur::class);
            return $entity;
        }else {
            return array();
        }
    }

    


}