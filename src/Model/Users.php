<?php

namespace Src\Model;

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
                throw new \Exception("Nenhum usuário encontrado!");
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
                throw new \Exception("Não há nenhum usuário cadastrado!");
            }
        }
        return false;
    }

    public function selectUsersCity($city)
    {
        if (isset($this->connection)) {
            try {
                $sql = "SELECT COUNT(US.id_user) AS USERCITY FROM tb_users US 
                            INNER JOIN tb_city C ON C.id_city = US.id_user
                        WHERE C.name_city = :name_city";
                $query = $this->connection->prepare($sql);
                $query->bindValue(':name_city', $city);
                if ($query->execute()) {
                    return $query->fetchAll(PDO::FETCH_OBJ);
                }
            } catch (Exception $e) {
                throw new \Exception("Não há nenhum usuário cadastrado!");
            }
        }
        return false;
    }

    public function selectUsersState($state)
    {
        // var_dump($state); die();
        if (isset($this->connection)) {
            try {
                $sql = "SELECT COUNT(US.id_user) AS USERSTATE FROM tb_users US 
                            INNER JOIN tb_state S ON S.id_state = US.id_user
                        WHERE S.name_state = :name_state";
                $query = $this->connection->prepare($sql);
                $query->bindValue(':name_state', $state);
                if ($query->execute()) {
                    return $query->fetch(PDO::FETCH_OBJ);
                }
            } catch (Exception $e) {
                throw new \Exception("Não há nenhum usuário cadastrado!");
            }
        }
        return false;
    }
}
