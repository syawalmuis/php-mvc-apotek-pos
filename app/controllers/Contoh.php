<?php

class Contoh extends Controller {

    public function index(){

        $this->view('templates/navbar4');
        $this->view('contoh/index');
        $this->view('templates/footer4');
    }
}