<?php
require_once "../vendor/autoload.php";

use Controller\UserController;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {


    case '/app/api/login':
                $controller = new UserController();
                $retorno = $controller->Login($_REQUEST);
                $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
                print($jsonRetorno);
        break;

    case '/app/api/user':
        $controller = new UserController();
        $retorno = $controller->GetUserById($_REQUEST);
        $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
        print($jsonRetorno);
        break;

    case '/app/api/alluser':
        $controller = new UserController();
        $retorno = $controller->GetAllUser();
        $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
        print($jsonRetorno);
        break;

    case '/about':
        require __DIR__ . '/controller/aboutus.php';
        break;

    default:
        http_response_code(404);
        //require __DIR__ . '/controller/404.php';
        break;
}