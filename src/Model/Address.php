<?php

namespace src\Model;

use Exception;
use PDO;

class Address
{
    private $connection;

    public function __construct($connect = null)
    {
        $this->connection = $connect;
    }

    public function insertAddress($address)
    {
        if (isset($this->connection)) {
            try {
                $sql = "INSERT INTO
                            tb_address(name_address)
                        VALUES(:name_address)";
                $query = $this->connection->prepare($sql);
                $query->bindValue(':name_address', $address);
                if ($query->execute()) {
                    return $this->connection->lastInsertId();
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }

    public function selectAddress(int $id)
    {
        if (isset($this->connection)) {
            try {
                $sql = "SELECT * FROM tb_address WHERE id_address = :id";
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

    public function selectAllAdresss()
    {
        if (isset($this->connection)) {
            try {
                $sql = "SELECT * FROM tb_address";
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
