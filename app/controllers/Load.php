<?php


class Load extends Controller{

    public function load(){
        
    }

    public function category(){

        
        $data['product'] = $this->model('H_model')->getCategory2();
        //$data['product'] = $this->model('H_model')->getCategory();
        $this->view('home/cat',$data);
    }

}