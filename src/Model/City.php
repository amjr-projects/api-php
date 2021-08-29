<?php

namespace src\Model;

use Exception;

class City
{
    private $connection;

    public function __construct($connect = null)
    {
        $this->connection = $connect;
    }

    public static function insertCity($city)
    {
        if (isset($this->connection)) {
            try {
                $sql = "INSERT INTO
                            tb_city(name_city)
                        VALUES(:name_city)";
                $query = $this->connection->prepare($sql);
                $query->bindValue(':name_city', $city->name_city);
                if ($query->execute()) {
                    return $query->lastInsertId();
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }
}