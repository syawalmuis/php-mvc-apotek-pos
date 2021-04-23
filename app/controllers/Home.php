<?php

class Home extends Controller{
    public function index(){
        $data['home']='active';
        $data['title']='Home';
        $data['pr'] = $this->model('Product_model')->getAllpr();
        $this->view('templates/navbarp',$data);
        $this->view('home/index',$data);
        $this->view('templates/footer4');
    }

    public function product(){
        $data['product'] = $this->model('H_model')->get();
        //$data['product'] = $this->model('H_model')->getCategory();
        $this->view('home/cat',$data);
    }

    
    public function categorySet(){

        if($this->model('H_model')->getCategory($_POST)>0){
            
        }
    }

    public function category(){

       // if ($this->model('H_model')->getCategory($_GET) > 0) {
            $data['product'] = $this->model('H_model')->getCategory2();
            //$data['product'] = $this->model('H_model')->getCategory();
        $this->view('home/cat', $data);
       // }
    }

    public function searchpost(){
       
            $data['product'] = $this->model('H_model')->searchpost();
            $this->view('home/cat',$data);
    }


    public function searchsesi(){
        ($this->model('H_model')->searchsesi($_POST));
    }
    
}