<?php

class Home_a extends Controller{
    public function index()
    {
        $data['home'] = 'active';
        $data['title'] = 'Home';
        
        $this->view('templates/navbar4',$data);
        $this->view('home_a/index');
        $this->view('templates/footer4');
      
    }
    
    public function product (){
        $data['title'] = 'Product';
        $data['product'] = 'active';
        $data['pr'] = $this->model('Product_model')->getAllpr();
        $data['max'] = $this->model('Product_model')->codeOtomatis();
        $this->view('templates/navbar4',$data);
        $this->view('Home_a/product',$data);
        $this->view('templates/footer4');
    }


    public function tambah(){

       if($this->model('Product_model')->addProduct($_POST) > 0){
           Flasher::setFlash('product code',$_POST['code'],'added','Succesfully','success');
           header('Location: '.BASEURL.'/home_a/product');
           exit;
       }else{
        Flasher::setFlash('product code',$_POST['code'],'already','Exists','danger');
        
       }
   }
   public function hapus($code){
    if($this->model('Product_model')->deleteProduct($code) > 0){
        Flasher::setFlash('product code',$code,'delete','Succesfully','success');
        header('Location: '.BASEURL.'/home_a/product');
        exit;
    }else{
     Flasher::setFlash('product code',$code,'already','Exists','danger');
     }
    }

    public function getedit()
    {
        echo json_encode($this->model('Product_model')->getProductbyId($_POST['code']));
    }

    public function edit(){
        if($this->model('Product_model')->editProduct($_POST) > 0){
            Flasher::setFlash('product code',$_POST['code'],'edit','Succesfully','success');
            header('Location: '.BASEURL.'/home_a/product');
            exit;
        }else{
            Flasher::setFlash('product code',$_POST['code'],'already','Exists','danger');
            header('Location: '.BASEURL.'/home_a/product');
        }
    }
} 