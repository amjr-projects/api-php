<?php

namespace Api\src\Model;

use Exception;

class City
{
    private $connection;

    public function __construct($connect = null)
    {
        $this->connection = $connect;
    }

    public function insertCity($city)
    {
        if (isset($this->connection)) {
            try {
                $sql = "INSERT INTO
                            tb_city(name_city)
                        VALUES(:name_city)";
                $query = $this->connection->prepare($sql);
                $query->bindValue(':name_city', $city->name_city);
                if ($query->execute()) {
                    return true;
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }
}