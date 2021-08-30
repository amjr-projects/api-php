<?php

header('Content-type: application/json');

require_once '../vendor/autoload.php';

// http://localhost/api-php/public_html/api/user/
// http://localhost/api-php/public_html/api/user/state/
// http://localhost/api-php/public_html/api/user/city/
// http://localhost/api-php/public_html/api/address/
// http://localhost/api-php/public_html/api/city/
// http://localhost/api-php/public_html/api/state/

if ($_GET['url']) {
    $url = explode('/', $_GET['url']);

    if ($url[0] === 'api') {
        array_shift($url);

        $service = 'src\Service\\' . ucfirst($url[0]) . 'Service';
        $method = $_SERVER['REQUEST_METHOD'];

        try {
            if ($url[0] === 'user') {
                array_shift($url);
                $userServ = new $service;

                if ($method === 'GET') {
                    if (sizeof($url) > 1) {
                        $response = $userServ->getUsersToParam($url);
                    } else {
                        $response = isset($url[0]) ? $userServ->getUsers($url[0]) : $userServ->getUsers();
                    }

                    http_response_code(200);
                    echo json_encode(array('status' => 'success', 'data' => $response));
                    exit;
                } else {
                    $response = $userServ->inserUser();

                    http_response_code(200);
                    echo json_encode(array('status' => 'success', 'data' => $response, JSON_UNESCAPED_UNICODE));
                    exit;
                }
            }

            if ($url[0] === 'address') {
                array_shift($url);
                $addressServ = new $service;

                $response = isset($url[0]) ? $addressServ->getAddress($url[0]) : $addressServ->getAddress();

                http_response_code(200);
                echo json_encode(array('status' => 'sucess', 'data' => $response));
            }

            if ($url[0] === 'city') {
                array_shift($url);
                $cityServ = new $service;

                $response = isset($url[0]) ? $cityServ->getCity($url[0]) : $cityServ->getCity();

                http_response_code(200);
                echo json_encode(array('status' => 'sucess', 'data' => $response));
            }

            if ($url[0] === 'state') {
                array_shift($url);
                $stateServ = new $service;

                $response = isset($url[0]) ? $stateServ->getState($url[0]) : $stateServ->getState();

                http_response_code(200);
                echo json_encode(array('status' => 'sucess', 'data' => $response));
            }
        } catch (\Exception $e) {
            http_response_code(404);
            echo json_encode(array('status' => 'error', 'data' => $e->getMessage()), JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
}
