<?php

namespace src\Model;

use Exception;

class State
{
    private $connection;

    public function __construct($connect = null)
    {
        $this->connection = $connect;
    }

    public static function insertState($state)
    {
        if (isset($this->connection)) {
            try {
                $sql = "INSERT INTO
                            tb_state(name_state)
                        VALUES(:name_address)";
                $query = $this->connection->prepare($sql);
                $query->bindValue(':name_state', $state->name_state);
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