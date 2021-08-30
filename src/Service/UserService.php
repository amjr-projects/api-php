<?php

namespace src\Service;

use Exception;
use src\Connection\Connection;
use src\Model\Address;
use src\Model\City;
use src\Model\State;
use src\Model\Transaction;
use src\Model\Users;

class UserService
{
    public function getUsers($id = null)
    {
        $user = new Users(Connection::connectDbApi());

        if ($id) {
            return $user->selectUser($id);
        } else {
            return $user->selectUsers();
        }
    }

    public function getUsersToParam($param)
    {
        $user = new Users(Connection::connectDbApi());

        if ($param[0] === 'state') {
            return $user->selectUsersState($param[1]);
        } else {
            return $user->selectUsersCity($param[1]);
        }
    }

    public function inserUser()
    {
        try {
            $data = (object) $_POST;

            $transactions = new Transaction(Connection::connectDbApi());

            $address = new Address(Connection::connectDbApi());
            $city = new City(Connection::connectDbApi());
            $state = new State(Connection::connectDbApi());
            $user = new Users(Connection::connectDbApi());

            $id_address = $address->insertAddress($data->name_address);
            $id_city = $city->insertCity($data->name_city);
            $id_state = $state->insertState($data->name_state);

            $transactions->startTransaction();

            if (!is_numeric($id_address)) {
                throw new Exception("Erro ao cadastrar o endereço do usuário");
            }

            if (!is_numeric($id_city)) {
                throw new Exception("Erro ao cadastrar a cidade do usuário");
            }

            if (!is_numeric($id_state)) {
                throw new Exception("Erro ao cadastrar o estado do usuário");
            }

            $data->id_address = $id_address;
            $data->id_city = $id_city;
            $data->id_state = $id_state;

            $user->insertUser($data);

            $transactions->commitTransaction();

            return 'Usuário(a) inserido com sucesso!';
        } catch (\Throwable $th) {
            $transactions->rollbackTransaction();
            throw new \Exception($th->getMessage());
        }
    }
}
