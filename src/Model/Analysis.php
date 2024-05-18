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
    public static function getDataChart(string $type, $whereHourly = null, $whereDate = null): array
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
            " . self::whereHourlyChart($whereHourly) . "
            " . self::whereDateChart($whereDate) . "

        ORDER BY a.ts 
        ";

        $req = $model->prepare($sql);


        $req->execute();

        if ($req->rowCount() > 1) {
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }
        return array();
    }

    public static function getDataChartN(string $type, $whereHourly = null, $whereDate = null): array
    {
        $model = static::getInstance();

         $sql = "
        SELECT
            aType.*,
            ROUND(a.value,2) as value,
            DATE_FORMAT(a.ts, '%H:%i') as ts
        FROM 
            analysis AS a
        LEFT JOIN analysis_type AS aType
            ON (a.`type` = aType.id) 
        WHERE 
            aType.id IN ($type)
            " . self::whereHourlyChart($whereHourly) . "
            " . self::whereDateChart($whereDate) . "

        ORDER BY a.ts 
        ";

        $req = $model->prepare($sql);


        $req->execute();

        if ($req->rowCount() > 1) {
            $data = array();
            $data["labels"] = self::getLabelsTs($type, $whereHourly, $whereDate);

            foreach ($req->fetchall(PDO::FETCH_ASSOC) as $row) {

                if (!isset($data["datasets"][$row["id"]])) {
                    $data["datasets"][$row["id"]] = array(
                        "label" => $row["name"],
                        "data" => array(),
                        "scatter" => true,
                        "pointRadius" => 5,
                        "pointHoverRadius" => 7,
                        "pointStyle" => 'circle',
                        "borderColor" => $row["color"],
                        "fill" => false
                    );
                }

                $data["datasets"][$row["id"]]["data"][] = array("x" => $row["ts"], "y" => $row["value"]);
            }
            $data["datasets"] = array_values($data["datasets"]);
            return $data;
        }
        return array();
    }

    public static function getLabelsTs(string $type, $whereHourly = null, $whereDate = null)
    {
        $model = static::getInstance();

        $sql = "
            SELECT DISTINCT
                DATE_FORMAT(a.ts, '%H:%i') as ts
            FROM 
                analysis AS a
            WHERE 
                a.`type` IN ($type)
                " . self::whereHourlyChart($whereHourly) . "
                " . self::whereDateChart($whereDate) . "

            ORDER BY a.ts 
        ";

        $req = $model->query($sql);

        if ($req->rowCount() > 0) {
            return $req->fetchAll(PDO::FETCH_COLUMN);
        }
        return array();
    }

    private static function whereHourlyChart($whereHourly = null)
    {
        return "AND a.ts >= DATE_SUB(NOW(), INTERVAL $whereHourly HOUR)
                AND a.ts < NOW()";
    }

    private static function whereDateChart($whereDate = null)
    {
        switch ($whereDate) {
            default:
                return "AND DATE(a.ts) = CURDATE()";
        }
    }

    public static function getStatsToday()
    {
        $model = static::getInstance();

        $sql = "
        SELECT 
            atype.name,
            atype.shortName,
            AVG(a.value) AS moyenne,
            ROUND(( (AVG(a.value) / atype.criticalValue) * 100), 2) AS moyenne_pourc,
            if ((ROUND(( (AVG(a.value) / atype.criticalValue) * 100), 2) - 100) < 0, 0, (ROUND(( (AVG(a.value) / atype.criticalValue) * 100), 2) - 100))  AS ecart_sup,
            atype.criticalValue,
            atype.color
        FROM 
            analysis AS a
        JOIN analysis_type AS atype
            ON (atype.id = a.`type`)
        WHERE
            DATE(a.ts) = CURDATE()
        GROUP BY a.type;
        ";

        $req = $model->query($sql);

        if ( $req->rowCount() > 0 ) {
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }
        return array();
    }
}
