<?php

namespace Core;

class BaseController {

    public static function render(string $folder , string $view , array $data = []){

        extract($data);

        require __DIR__ . '/../Views/' . $folder . '/' . $view . '.php';
    }
}