<?php


class Login_model{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function cekSesi(){
        $username = $_POST['username'];
        $pass = $_POST['password'];

        $this->db->query( "SELECT * FROM user_login WHERE username=:username and password=:password");


        $this->db->bind('username',$username);
        $this->db->bind('password',$pass);

        $this->db->execute();

        return $this->db->single();
      
        return $this->db->rowCount();


    }
    public function logOut(){
        session_destroy();
        header('Location: '.BASEURL.'/login');
    }
}