<?php

namespace src\Service;

use src\Connection\Connection;
use src\Model\State;

class StateService
{
    public function getState($id = null)
    {
        $city = new State(Connection::connectDbApi());

        if ($id) {
            return $city->selectState($id);
        } else {
            return $city->selectAllState();
        }
    }
}