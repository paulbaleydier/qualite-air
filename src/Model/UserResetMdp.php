<?php
namespace Model;

use Model\Model;
use PDO;

class UserResetMdp extends Model {
    protected static $table = "utilisateurs_reset_password"; 
    protected static $id = "id"; 


    public static function getByTokenUserID($token, $userID) {
        $model = static::getInstance();

        $sql = "SELECT
                    *
                FROM
                    utilisateurs_reset_password AS urp
                WHERE
                    urp.useToken <> 0
                    AND urp.token = '$token'
                    AND urp.userID = '$userID'
                    AND urp.ts >= DATE_SUB(NOW(), INTERVAL 15 MINUTE)";

        $req = $model->prepare($sql);

        $req->execute();

        return $req->rowCount() > 0 ? $req->fetch(PDO::FETCH_COLUMN) : false;
    }
    

}