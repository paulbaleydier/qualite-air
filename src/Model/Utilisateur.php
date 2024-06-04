<?php 
namespace Model;

use PDO;

use Model\Model;

class Utilisateur extends Model {

    protected static $table = "utilisateurs"; 
    protected static $id = "id";



    public static function getAll($query = "*")
    {
        $pdo = self::getInstance();

        $sql = "SELECT $query FROM " . static::$table . " ORDER BY prenom,nom ASC";

        $req = $pdo->query($sql);

        if ($req->rowCount() > 0) {
            $results = array();
            $rows = $req->fetchAll(PDO::FETCH_ASSOC);
            $className = "Entity\\" . ucfirst(substr(strrchr(get_called_class(), '\\'), 1));

            foreach ($rows as $row) {
                array_push($results, new $className($row));
            }
            return $results;

        } else {
            return array();
        }
    }

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

    // public static function test() {
    //     $model = self::getInstance();

    //     $sql = "SELECT * FROM " . self::$table . " as u WHERE u.id = 44";

    //     $req = $model->query($sql);

    //     // var_dump($req);die();
    //     // $user = $req->fetchAll(PDO::FETCH_CLASS, 'Entity\Utilisateur', array($req->errorInfo()))[0];
    //     $user = $req->fetchObject(\Entity\Utilisateur::class);
    //     // var_dump($req->fetch(PDO::FETCH_ASSOC));
    //     var_dump($user);
    // } 

    


}