<?php

namespace Controllers;

use Core\BaseController;
use Core\Security;
use Models\User;

class renderController extends BaseController {
    
    public function renderUsers($num , $after) {
        $userObj = new User();
        $users = $userObj->all($num , $after);
        $this->render('Main' , 'users' , ['users' => $users]);
    }
}