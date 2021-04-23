<?php


class Stock_out extends Controller{
    
    public function index(){
        $data['code'] = $this->model('Suplai_model')->getProductCode();;
        $data['title'] = 'Stock Out';
        $data['product'] = 'active';
        $data['out'] = $this->model('Stock_out_model')->show();
        $this->view('templates/navbar4', $data);
        $this->view('suplai/stock_out', $data);
        $this->view('templates/footer4');
    }

    //add data stock out
    public function add(){
        if($this->model('Stock_out_model')->add($_POST) > 0){
            Flasher::setFlash('Product Stock out','','Add','Succesfully','success');
            header('Location: '.BASEURL.'/stock_out');
        }
    }
    //end add data stock out

    //delete data
    public function del($id){
        if($this->model('Stock_out_model')->del($id) > 0){
            Flasher::setFlash('','','Delete','Succesfully','success');
            header('Location: '.BASEURL.'/stock_out');
        }
    }
    //end delete data

    //edit show
    public function editshow(){
        
        echo json_encode($this->model('Stock_out_model')->editshow($_POST['id']));
    }
    //end edit show

    //update
    public function up(){
        if($this->model('Stock_out_model')->up($_POST) > 0){
            Flasher::setFlash('','','Update','Succesfully','success');
            header('Location: '.BASEURL.'/stock_out');
        }
    }
    //end update


}