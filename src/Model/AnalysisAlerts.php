<?php
namespace Model;

use PDO;
use Model\Model;

class AnalysisAlerts extends Model
{
    protected static $table = "analysis_alerts";
    protected static $id = "id";

    public static function getAlertsForUser(int $userID)
    {
        $model = static::getInstance();

        $sql = "
            SELECT 
                aal.id,
                aal.value,
                at.name,
                at.shortName,
                at.criticalValue,
                at.unitType,
                DATE_FORMAT(aal.ts, '%d/%m/%Y %H:%i:%s') AS datefR
            FROM
                " . static::$table . " AS aal
            INNER JOIN 
                analysis_type as at ON (at.id = aal.typeID)
            WHERE
                (SELECT COUNT(*) FROM analysis_alerts_treat as alt WHERE aal.id = alt.alertID AND alt.userID = :userID) = 0
        ";

        $req = $model->prepare($sql);

        $req->bindParam(":userID", $userID,PDO::PARAM_INT);

        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function getAlertsHistory() {
        $model = static::getInstance();

        $sql = "
            SELECT
                aal.value,
                at.name,
                at.shortName,
                at.criticalValue,
                at.unitType,
                DATE_FORMAT(aal.ts, '%d/%m/%Y %H:%i:%s') AS datefR
            FROM
                " . static::$table . " as aal
            INNER JOIN 
                analysis_type as at ON (at.id = aal.typeID)
        ";

        $req = $model->query($sql);

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function clearData(){
        $model = static::getInstance();

        $sql = "DELETE FROM `analysis_alerts`";
        
        $req = $model->query($sql);

    }
}