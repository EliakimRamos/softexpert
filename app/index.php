<?php
require_once "../vendor/autoload.php";

use Controller\UserController;
use Controller\ProfileController;
use Controller\ProductTypeController;

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
    case '/app/api/insertuser':
        $controller = new UserController();
        $retorno = $controller->InsertUser($_REQUEST);
        $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
        print($jsonRetorno);
        break;
    case '/app/api/updateuser':
        $controller = new UserController();
        $retorno = $controller->UpdateUser($_REQUEST);
        $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
        print($jsonRetorno);
        break;

    case '/app/api/getprofile':
        $controllerProfile = new ProfileController();
        $retorno = $controllerProfile->GetProfile($_REQUEST);
        $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
        print($jsonRetorno);
        break;
    case '/app/api/profiles':
        $controllerProfile = new ProfileController();
        $retorno = $controllerProfile->Profiles();
        $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
        print($jsonRetorno);
        break;
    case '/app/api/insertprofile':
        $controllerProfile = new ProfileController();
        $retorno = $controllerProfile->InsertProfile($_REQUEST);
        $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
        print($jsonRetorno);
        break;
    case '/app/api/updateprofile':
        $controllerProfile = new ProfileController();
        $retorno = $controllerProfile->UpdateProfile($_REQUEST);
        $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
        print($jsonRetorno);
        break;
    case '/app/api/insertproducttype':
        $controllerProductType = new ProductTypeController();
        $retorno = $controllerProductType->InsertProductType($_REQUEST);
        $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
        print($jsonRetorno);
        break;
    case '/app/api/updateproducttype':
        $controllerProductType = new ProductTypeController();
        $retorno = $controllerProductType->UpdateProductType($_REQUEST);
        $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
        print($jsonRetorno);
        break;
    case '/app/api/producttypes':
        $controllerProductType = new ProductTypeController();
        $retorno = $controllerProductType->productTypes();
        $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
        print($jsonRetorno);
        break;
    case '/app/api/getproducttype':
        $controllerProductType = new ProductTypeController();
        $retorno = $controllerProductType->GetProductType($_REQUEST);
        $jsonRetorno = json_encode(array('data' => array('status' => 200, 'mensage'=> $retorno)));
        print($jsonRetorno);
        break;

    default:
        http_response_code(404);
        //require __DIR__ . '/controller/404.php';
        break;
}