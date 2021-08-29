<?php

namespace src\Service;

use src\Connection\Connection;
use src\Model\Address;
use src\Model\City;
use src\Model\State;
use src\Model\Users;

class UserService
{
    public static function getUsers($id = null)
    {
        $user = new Users(Connection::connectDbApi());

        if ($id) {
            return $user::selectUser($id);
        } else {
            return $user::selectUsers();
        }
    }

    public function inserUser($data)
    {
        try {
            $address = new Address(Connection::connectDbApi());

            $city = new City(Connection::connectDbApi());

            $state = new State(Connection::connectDbApi());

            $user = new Users(Connection::connectDbApi());
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}