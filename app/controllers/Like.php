<?php


class Like extends Controller
{
    public function tambah()
    {
        $this->model('Like_model')->tambah($_POST['code']);
    }
    
    public function kurang()
    {
        $this->model('Like_model')->kurang($_POST['code']);
    }
}