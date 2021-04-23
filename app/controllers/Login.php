<?php

class Login extends Controller
{
    public function index()
    {
        $this->view('templates/header');
        $this->view('login/login');
        $this->view('templates/footer');
    }

    public function auth()
    {
        if ($this->model('Login_model')->cekSesi($_POST)>0) {
            $data= $this->model('Login_model')->cekSesi();

            
            $_SESSION['name'] = $data['name'];
            $_SESSION['level']= $data['level'];
            $_SESSION['username']= $data['username'];
            $_SESSION['image']= $data['image'];

            if ($data['level']=="admin") {
                header('Location: '.BASEURL.'/home_a');
            } elseif ($data['level']=="member") {
                header('Location: '.BASEURL.'/member');
            }
        } else {
            header('Location: '.BASEURL.'/login');
        }
    }

    public function logOut()
    {
        $this->model('Login_model')->logOut();
    }

    public function register()
    {
        $this->view('templates/navbar');
        $this->view('login/register');
        $this->view('templates/footer');
    }
}