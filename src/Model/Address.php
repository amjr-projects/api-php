<?php

namespace src\Model;

use Exception;

class Address
{
    private $connection;

    public function __construct($connect = null)
    {
        $this->connection = $connect;
    }

    public static function insertAddress($address)
    {
        if (isset($this->connection)) {
            try {
                $sql = "INSERT INTO
                            tb_address(name_address)
                        VALUES(:name_address)";
                $query = $this->connection->prepare($sql);
                $query->bindValue(':name_address', $address->name_address);
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
