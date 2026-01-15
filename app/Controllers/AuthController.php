<?php
namespace Controllers;

use Core\BaseController;
use Models\User;

class AuthController extends BaseController
{

    public function register()
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $userObj = new User();
            $results = $userObj->findByEmail($_POST['email']);

            if($results){
                $this->render('Auth' , 'register');
                return;
            }


            $userObj->first_name = $_POST['firstName']; 
            $userObj->last_name  = $_POST['lastName'];
            $userObj->email      = $_POST['email'];
            $userObj->password   = $_POST['password'];
            $userObj->save();
            
            echo "REGISTER POST OK";
            return;
        }
        $this->render('Auth' , 'register');
        
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "LOGIN POST OK";
            return;
        }
        $this->render('Auth' , 'login');
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }

    public function dashboard()
    {
        $this->render('Main' , 'dashboard');
    }
}