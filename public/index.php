<?php

session_start();

require_once __DIR__ . '../../vendor/autoload.php';

use Controllers\AuthController;
use Controllers\renderController;
use Core\Router;

if(!isset($_SESSION['userId'])){
    $_SERVER['REQUEST_URI'] = '/login';
}

    $router = new Router();

    // $router->get("/users/{num}/{after}" , [renderControllers::class , 'renderUsers']);

    $router->get("/users/{num}/{after}", function ($num, $after) {
        $controllerObj = new renderController();
        $controllerObj->renderUsers($num , $after);
    });

    $router->get("/login",[AuthController::class , 'login']);
    $router->post("/login",[AuthController::class , 'login']);

    $router->get("/register",[AuthController::class , 'register']);
    $router->post("/register",[AuthController::class , 'register']);

    $router->get("/dashboard",[AuthController::class , 'dashboard']);
    $router->dispatch();
?>