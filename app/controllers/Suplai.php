<?php

class Suplai extends Controller{

    public function index (){
        $data['title'] = 'Stock In';
        $data['product'] = 'active';
        $data['code'] = $this->model('Suplai_model')->getProductCode();
        $data['supp'] = $this->model('Suplai_model')->getSupp();
        $data['supp-data'] = $this->model('Suplai_model')->getSuppData();
        $this->view('templates/navbar4',$data);
        $this->view('suplai/index',$data);
        $this->view('templates/footer4');
    }

    public function getName(){
        echo json_encode($this->model('Suplai_model')->getProductName($_POST['code']));
    }

    public function updateStock(){
        if($this->model('Suplai_model')->add($_POST)>0){
            $_SESSION['stock_first'] = $_POST['stock-awal'];
            $_SESSION['stock'] = $_POST['stock'];
            $_SESSION['code'] = $_POST['code-product'];
            
            if ($_SESSION['stock']>0) {
                header('Location: '.BASEURL.'/suplai/updateStock2');
            }
        }
    }

    public function updateStock2(){
        if ($this->model('Suplai_model')->updateStock($_POST)>0){

            Flasher::setFlash('','','Add','Succesfully','success');
            header('Location: '.BASEURL.'/suplai');
        }else{
            
            Flasher::setFlash('','','delete','Succesfully','danger');
            header('Location: '.BASEURL.'/suplai');
            
        }
    }

    public function detail(){
        echo json_encode($this->model('Suplai_model')->getSuppDetail($_POST['id_supp']));
    }


    public function del($id_supp){
        $data['supp_del'] = $this->model('Suplai_model')->getSuppDetail($id_supp);
        $_SESSION['supp'] = $data['supp_del'];

        $code = $_SESSION['supp']['code'];
        $data['product'] = $this->model('Suplai_model')->getProductName($code);

        $_SESSION['product'] = $data['product'];

        $code = $_SESSION['product']['code'];
        
        if ($this->model('Suplai_model')->updateStockdel($code)>0){
            
            header('Location: '.BASEURL.'/suplai/delSupp');
        }
       
    }

    public function delSupp(){
        $id = $_SESSION['supp']['id_supp'];
        
        if ($this->model('Suplai_model')->delSupp($id)>0){
            
            Flasher::setFlash('','','delete','Succesfully','success');
            header('Location: '.BASEURL.'/suplai');
        }
    }

//     public function tes(){
//         $data['supp'] = $_SESSION['supp'];
//         $data['product'] = $_SESSION['product'];
        
//         $code = $data['product']['code'];
//         $stock_product = $data['product']['stock'];
//         $stock_supp = $data['supp']['stock_supp'];
//         $stock_del = $stock_product - $stock_supp;
        
//         if ($this->model('Suplai_model')->updateStockdel($code)>0){
//             header('Location: '.BASEURL.'');
//         }
        
//    }


    //update data

    public function upTableSupp(){

        if($this->model('Suplai_model')->upSupp($_POST)>0){
            // var_dump($_SESSION['stock_first'],$_SESSION['code'],$_SESSION['stock'], $_SESSION['stock_product'], $_SESSION['stock_end']); 
            // var_dump($tes, $tes2);die;
            
        }


    }

    public function upProduct(){

        if($this->model('Suplai_model')->upProduct($_POST) > 0){
            header('Location: '.BASEURL.'');
        }
        
    }

    public function ajaxpr(){
        echo json_encode($this->model('Suplai_model')->getProductName($_POST['code']));
    }

    public function editSupp(){
        if ($this->model('Suplai_model')->upSupp($_POST) > 0){
            Flasher::setFlash('','','Update','Succesfully','success');
            header('Location: '.BASEURL.'/stock_out');
        }else{
            header('Location: '.BASEURL.'/stock_out');
        }
    }

    public function getAddr(){
        echo json_encode($this->model('Suplai_model')->getAddr($_POST['supp_name']));
    }
} 