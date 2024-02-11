<?php

namespace Model;

use Model\Model;
use PDO;

class Analysis extends Model
{
    protected static $table = "analysis";
    protected static $id = "id";


    /**
     * par exemple les type avec l'id 1,2,3
     *  $type = '1,2,3' 
     * 
     */
    public static function getDataChart(string $type): array
    {
        $model = static::getInstance();

        $sql = "
        SELECT
            aType.*,
            a.value,
            DATE_FORMAT(a.ts, '%d/%m/%Y %H:%i') as ts
        FROM 
            analysis AS a
        LEFT JOIN analysis_type AS aType
            ON (a.`type` = aType.id) 
        WHERE 
            aType.id IN ($type)
        ORDER BY a.ts 
        ";

        $req = $model->prepare($sql);


        $req->execute();

        if ($req->rowCount() > 1) {
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }
        return array();
    }
}
