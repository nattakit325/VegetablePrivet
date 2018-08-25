<?php
use core\Session;
use core\Cotroller\Controller;
use models\login_model;

class login extends Controller
{

    private $model;

    public function __construct()
    {
        parent::__construct();
        require_once 'models/login_model.php';
        $this->model = new login_model();
        Session::init();
    }

    public function formLogin()
    {
        
        $user = Session::get('user');
        if($user['username'] == ""){
            $this->views('login/login', NULL);
        }else{
            header('location:/index');
        }
        
    }
    
    public function logout(){
        Session::destroy();
        header('location:/index');
    }

    public function login()
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        $result = $this->model->getPasswordByUsername($username);
        $passwordHash = $result['password'];
        $userId = $result['username'];
        
        if (password_verify($password, $passwordHash)) {
            $user = $this->model->getUserDetail($userId);
           
            Session::set('user', $user);
            header('location:/index');
        } else {
            header('location:/login/formLogin');
        }
    }
}

