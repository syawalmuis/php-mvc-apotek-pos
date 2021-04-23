<?php 

class Supp_data extends Controller{

    public function index(){
        $data['title'] = 'Supplier Data';
        $data['product'] = 'active';
        $data['idOto'] = $this->model('Supp_model')->getIdOto();
        $data['supp'] = $this->model('Supp_model')->getSuppData();
        $this->view('templates/navbar4',$data);
        $this->view('suplai/supp_data',$data);
        $this->view('templates/footer4');
    }

    //add data
    public function add(){
        if($this->model('Supp_model')->add($_POST) > 0){
            Flasher::setFlash('Supplier Store',$_POST['name-supp'],'Add','Succesfully','success');
            header('Location: '.BASEURL.'/supp_data');
        }
    }
    //end add data

    //del data
    public function del($id){
        if($this->model('Supp_model')->del($id) > 0){
            echo "<script>alert('Data berhasil di hapus')</script>";
            echo "<script>window.location ='http://localhost/mvcelearning/public/supp_data'</script>";
        }
    }
    //end del data

    //edit detail
    public function editdetail(){
        echo json_encode($this->model('Supp_model')->editdetail($_POST['id']));
    }
    //end edit detail

    //edit save
    public function editsave(){
        if($this->model('Supp_model')->editsave($_POST) > 0){
            Flasher::setFlash('Supplier Store',$_POST['modal-supp-data-name'],'Change','Succesfully','success');
            header('Location: '.BASEURL.'/supp_data');
        }else{
            Flasher::setFlash('Supplier Store',$_POST['modal-supp-data-name'],'Change','Failed','danger');
            header('Location: '.BASEURL.'/supp_data');
        
        }
    }
    //end edit save

}