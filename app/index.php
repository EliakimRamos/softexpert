<?php


$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '':
    case '/':
        require __DIR__ . '/controller/user.php';
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
        require __DIR__ . '/controller/404.php';
        break;
}