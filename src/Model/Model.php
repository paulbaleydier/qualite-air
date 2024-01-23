<?php

namespace Model;

use Others\Configuration as Config;
use PDO;
use PDOException;

class Model
{
    protected static $table;
    protected static $database;
    protected static $id;

    private static $pdo;



    private static function connect()
    {
        $host = Config::get("DB_HOST");
        static::$database = static::$database ?? Config::get("DB_DATABASE");
        $username = Config::get("DB_USERNAME");
        $password = Config::get("DB_PASSWORD");

        try {
            self::$pdo = new PDO('mysql:host=' . $host . ';dbname=' . static::$database, $username, $password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        return self::$pdo;
    }




    protected static function getInstance()
    {
        return self::$pdo ?? self::connect();
    }

    // others méthodes


    public static function getByID(int $id)
    {
        $pdo = self::getInstance();

        $sql = "SELECT
                    *
                FROM 
                    " . static::$table . " as t
                WHERE t." . static::$id . " = $id
        ";

        $req = $pdo->query($sql);

        if ($req->rowCount() > 0) {
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $className = "Entity\\" . ucfirst(substr(strrchr(get_called_class(), '\\'), 1));
            $instance = new $className($data);
            return $instance;
        } else {
            return null;
        }
    }

    public static function getAll($query = "*")
    {
        $pdo = self::getInstance();

        $sql = "SELECT $query FROM " . static::$table;

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
            return null;
        }
    }



    public static function insertObject(object $data)
    {
        $pdo = self::getInstance();
        $dataArray = (array)$data;

        $columns = implode(', ', array_keys($dataArray));
        $values = ':' . implode(', :', array_keys($dataArray));

        $sql = "INSERT INTO " . static::$table . "($columns) VALUES ($values);";

        $req = $pdo->prepare($sql);
        foreach ($dataArray as $key => $value) {
            $req->bindValue(":$key", $value);
        }

        return $req->execute();
    }

    public static function update($id, array $data)
    {
        $pdo = self::getInstance();

        $setter = [];
        foreach ($data as $key => $value) {
            $setter[] = "$key = :$key";
        }

        $setClause = implode(', ', $setter);

        $sql = "UPDATE " . static::$table . " SET $setClause WHERE " . static::$id . " = :id";
        $req = $pdo->prepare($sql);

        $req->bindParam(':id', $id);

        foreach ($data as $key => $value) {
            $req->bindValue(":$key", $value);
        }

        return $req->execute();
    }

    public static function delete($id)
    {
        $pdo = self::getInstance();

        $query = "DELETE FROM " . static::$table . " WHERE " . static::$id . " = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}
