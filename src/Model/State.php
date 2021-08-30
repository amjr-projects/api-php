<?php

namespace src\Model;

use Exception;
use PDO;

class State
{
    private $connection;

    public function __construct($connect = null)
    {
        $this->connection = $connect;
    }

    public function insertState($state)
    {
        if (isset($this->connection)) {
            try {
                $sql = "INSERT INTO
                            tb_state(name_state)
                        VALUES(:name_state)";
                $query = $this->connection->prepare($sql);
                $query->bindValue(':name_state', $state);
                if ($query->execute()) {
                    return $this->connection->lastInsertId();
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }

    public function selectState(int $id)
    {
        if (isset($this->connection)) {
            try {
                $sql = "SELECT * FROM tb_state WHERE id_state = :id";
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

    public function selectAllState()
    {
        if (isset($this->connection)) {
            try {
                $sql = "SELECT * FROM tb_state";
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