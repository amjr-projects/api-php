<?php

namespace src\Service;

use src\Connection\Connection;
use src\Model\Address;

class AddressService
{
    public function getAddres($id = null)
    {
        $address = new Address(Connection::connectDbApi());

        if ($id) {
            return $address->selectAddress($id);
        } else {
            return $address->selectAllAdresss();
        }
    }
}