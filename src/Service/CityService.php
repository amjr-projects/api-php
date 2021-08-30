<?php

use src\Connection\Connection;
use src\Model\City;

class CityService
{
    public function getCity($id = null)
    {
        $city = new City(Connection::connectDbApi());

        if ($id) {
            return $city->selectCity($id);
        } else {
            return $city->selectAllCity();
        }
    }
}