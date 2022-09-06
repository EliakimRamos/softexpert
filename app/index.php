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

    case '/courses':
        require __DIR__ . '/controller/courses.php';
        break;

    case '/controller/authors':
        require __DIR__ . '/controller/authors.php';
        break;

    case '/about':
        require __DIR__ . '/controller/aboutus.php';
        break;

    default:
        http_response_code(404);
        //require __DIR__ . '/controller/404.php';
        break;
}