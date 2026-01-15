<?php

require_once __DIR__ . '../../vendor/autoload.php';

use Controllers\AuthController;
use Core\Router;

if($_SERVER['REQUEST_URI'] === '/'){
    $_SERVER['REQUEST_URI'] = '/login';
}

    $router = new Router();

    $router->get("/user/{id}/{user}",function($id , $user){
        echo 'user_id: ' . $id . " user_name: " . $user;
    });

    $router->get("/login",[AuthController::class , 'login']);
    $router->post("/login",[AuthController::class , 'login']);
    $router->get("/register",[AuthController::class , 'register']);
    $router->post("/register",[AuthController::class , 'register']);
    $router->get("/dashboard",[AuthController::class , 'dashboard']);
    $router->dispatch();
?>