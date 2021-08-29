<?php

namespace src\Connection;

use PDO;

class Connection
{
    private static $dbApi;

    public static function connectDbApi()
    {
        try {
            if (!isset(self::$dbApi)) {
                $dsn = "mysql:localhost;dbname=dbapi";
                self::$dbApi = new PDO($dsn, "root", "Julia@na07");
                self::$dbApi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$dbApi->query("SET NAMES 'utf-8'");
            }

            return self::$dbApi; 
        } catch (\Throwable $th) {
            echo "ERRO: " . $th->getMessage();
        }
    }
}