<?php
namespace Controllers;

use Core\BaseController;
use Core\Security;
use Models\User;

class AuthController extends BaseController
{

    public function register()
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $tokenFromPost = $_POST['csrf_token'] ?? '';

            if (!Security::verifyCSRFToken($tokenFromPost)) {
                echo "csrf token non valid!";
                $this->render('Auth' , 'register');
                die();
            }

            $firstName = Security::clean($_POST['firstName']) ?? '';
            $lastName = Security::clean($_POST['lastName']) ?? '';
            $email = Security::clean($_POST['email']) ?? '';

            if (empty($firstName) || empty($lastName) || empty($email) || empty($_POST['password'])) {
                echo "donnes non valide!";
                $this->render('Auth' , 'register');
                exit();
            }

            if (!Security::validatePassword($_POST['password'] ?? '')) {
                echo "password non valide!";
                $this->render('Auth' , 'register');
                exit();
            }

            $password = Security::hashPassword($_POST['password'] ?? '');

            if (!Security::validateEmail($email)) {
                echo "email non valide!";
                $this->render('Auth' , 'register');
                exit();
            }



            $userObj = new User();
            $results = $userObj->findByEmail(Security::clean($_POST['email']));

            if($results){
                echo "email aready existe!";
                $this->render('Auth' , 'register');
                return;
            }

            $userObj->first_name = $firstName;
            $userObj->last_name  = $lastName;
            $userObj->email      = $email;
            $userObj->password   = $password;
            $userObj->save();
            
            $this->render('Auth' , 'login');
            return;
        }
        $this->render('Auth' , 'register');
        
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $tokenFromPost = $_POST['csrf_token'] ?? '';

            if (!Security::verifyCSRFToken($tokenFromPost)) {
                echo "csrf token non valid!";
                $this->render('Auth' , 'login');
                die();
            }

            $email = Security::clean($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                echo "donnes non valide!";
                $this->render('Auth' , 'login');
                exit();
            }

            $userObj = new User();
            $results = $userObj->findByEmail($email);          

            if(!$results || !Security::verifyPassword($password , $results['password_hash'])){
                echo "email or password non valide!";
                $this->render('Auth' , 'login');
                exit();
            }
            $_SESSION['userId'] = $results['id'] ;
            $_SESSION['userEmail'] = $results['email'];
            $_SESSION['userFirstName'] = $results['first_name'];
            $_SESSION['userLastName'] = $results['last_name'];
            $this->render('Main' , 'dashboard');
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