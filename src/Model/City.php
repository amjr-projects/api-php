<?php

namespace src\Model;

use Exception;
use PDO;

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
                $query->bindValue(':name_city', $city);
                if ($query->execute()) {
                    return $this->connection->lastInsertId();
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }

    public function selectCity(int $id)
    {
        if (isset($this->connection)) {
            try {
                $sql = "SELECT * FROM tb_city WHERE id_city = :id";
                $query = $this->connection->prepare($sql);
                $query->bindValue(':id', $id);
                if ($query->execute()) {
                    return $query->fetch(PDO::FETCH_OBJ);
                }
            } catch (Exception $e) {
                throw new \Exception("Nenhum endereço encontrado!");
            }
        }
        return false;
    }

    public function selectAllCity()
    {
        if (isset($this->connection)) {
            try {
                $sql = "SELECT * FROM tb_city";
                $query = $this->connection->prepare($sql);
                if ($query->execute()) {
                    return $query->fetchAll(PDO::FETCH_OBJ);
                }
            } catch (Exception $e) {
                throw new \Exception("Não há nenhum endereço cadastrado!");
            }
        }
        return false;
    }
}