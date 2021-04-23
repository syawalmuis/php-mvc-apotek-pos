<?php

class Category extends Controller{
    public function index(){
        $this->view('templates/t_category');
        $this->view('category/index');
    }
}