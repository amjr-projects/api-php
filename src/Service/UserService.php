<?php

namespace Api\Service;

use Api\src\Connection\Connection;
use src\Model\Users;

class UserService
{
    public static function getUsers($id = null)
    {
        $user = new Users(Connection::connectDbApi());
        var_dump($user); die();
        // if ($id) {
        //     return Users::selectUser($id);
        // } else {
        //     return Users::selectUsers();
        // }
    }
}