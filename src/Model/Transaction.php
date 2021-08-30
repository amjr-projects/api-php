<?php

namespace src\Model;

use Exception;

class Transaction
{
    private $connection;

    public function __construct($connect = null)
    {
        $this->connection = $connect;
    }

    public function startTransaction()
    {
        if (isset($this->connection)) {
            try {
                return $this->connection->beginTransaction();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }

    public function rollbackTransaction()
    {
        if (isset($this->connection)) {
            try {
                return $this->connection->rollback();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }

    public function commitTransaction()
    {
        if (isset($this->connection)) {
            try {
                return $this->connection->commit();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return false;
    }
}
