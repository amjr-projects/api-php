<?php

namespace Api\src\Model;

use Exception;
use PDO;

class Users
{
    private $connection;

    public function __construct($connect = null)
    {
        $this->connection = $connect;
    }

    public function insertUser($data)
    {
        if (isset($this->connection)) {
            try {
                $sql = "INSERT INTO 
                            tb_users(name_user, id_address, id_city, id_state)
                        VALUES(:name_user, :id_address, :id_city, :id_state)";
                $query = $this->connection->prepare($sql);
                $query->bindValue(':name_user', $data->name_user);
                $query->bindValue(':id_address', $data->id_address);
                $query->bindValue(':id_city', $data->id_city);
                $query->bindValue(':id_state', $data->id_state);
                if ($query->execute()) {
                    return true;
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }

    public function selectUser(int $id)
    {
        if (isset($this->connection)) {
            try {
                $sql = "SELECT * FROM tb_users WHERE id_user = :id";
                $query = $this->connection->prepare($sql);
                $query->bindValue(':id', $id);
                if ($query->execute()) {
                    return $query->fetch(PDO::FETCH_OBJ);
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }

    public function selectUsers()
    {
        if (isset($this->connection)) {
            try {
                $sql = "SELECT * FROM tb_users";
                $query = $this->connection->prepare($sql);
                if ($query->execute()) {
                    return $query->fetchAll(PDO::FETCH_OBJ);
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }
}
