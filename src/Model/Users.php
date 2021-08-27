<?php

namespace Api\src\Model;

use Exception;

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
}
