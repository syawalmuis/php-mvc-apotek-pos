<?php

class User extends Controller{


    public function index(){
        $data['user'] = "active";
        $data['title'] = "User";
        $data['admin'] = $this->model('User_model')->getAdmin();
        $data['idOto'] = $this->model('User_model')->idOtomatis();
        $this->view('templates/navbar4',$data);
        $this->view('userview/index',$data);
        $this->view('templates/footer4');
    }

    public function member(){
        $data['user'] = "active";
        $data['title'] = "User";
        $data['member'] = $this->model('User_model')->getMember(); 
        $data['idOto'] = $this->model('User_model')->idOtomatis();
        $this->view('templates/navbar4',$data);
        $this->view('userview/member',$data);
        $this->view('templates/footer4');
    }

    public function getEditMember(){
        echo json_encode($this->model('User_model')->getMemberbyId($_POST['id']));
    }
    public function getEditAdmin(){
        echo json_encode($this->model('User_model')->getAdminbyId($_POST['id']));
    }

    //edit
    public function saveAdmin(){
        if($this->model('User_model')->saveAdmin($_POST) > 0){
            Flasher::setFlash('Admin id',$_POST['id'],'change','Succesfully','success');
            header('Location: '.BASEURL.'/user/');
            exit;
        }else{
            Flasher::setFlash('Admin id',$_POST['id'],'change','Error','danger');
            header('Location: '.BASEURL.'/user/');
            exit;
        }
    }

    //edit
    public function saveMember(){
        if($this->model('User_model')->saveMember($_POST) > 0){
            Flasher::setFlash('Member id',$_POST['id'],'change','Succesfully','success');
            header('Location: '.BASEURL.'/user/member');
            exit;
        }else{
            Flasher::setFlash('',$_POST['id'],'change','Error','danger');
            header('Location: '.BASEURL.'/user/member');
            exit;
        }
    }

    /* load data ajax
    public function viewAdmin(){
          $data['admin'] = $this->model('User_model')->getAdmin();
          $this->view('userview/loadAd',$data);
         
     }*/

    public function viewMember(){
        
        $this->view('userview/loadM');
    }

    public function addAdmin(){
        if($this->model('User_model')->addAdminModel($_POST) > 0){
            Flasher::setFlash('username',$_POST['username'],'added','Succesfully','success');
            header('Location: '.BASEURL.'/user');
            exit;
        }else{
            Flasher::setFlash('',$_POST['username'],'already','Exists','danger');
            
            exit;
        }
    }

    //delete Admin
    public function deleteAdmin($id){
        if($this->model('User_model')->deleteAdmin($id)>0){
            Flasher::setFlash('',$_POST['id'],'delete','Succesfully','success');
            header('Location: '.BASEURL.'/user/');
            exit;
        }else{
         Flasher::setFlash('',$_POST['id'],'delete','Error','danger');
            
        }
    }
    public function deleteMember($id){
        if($this->model('User_model')->deleteMember($id)>0){
            Flasher::setFlash('',$_POST['id'],'delete','Succesfully','success');
            header('Location: '.BASEURL.'/user/member');
            exit;
        }else{
            Flasher::setFlash('',$_POST['id'],'delete','Error','danger');
            header('Location: '.BASEURL.'/user/member');
            exit;
        }
    }

    public function addMember(){
        if($this->model('User_model')->addMemberModel($_POST) > 0){
            Flasher::setFlash('member username',$_POST['username'],'added','Succesfully','success');
            header('Location: '.BASEURL.'/user/member');
            exit;
        }else{
         Flasher::setFlash('username',$_POST['username'],'already','Exists','danger');
         
        }
    }

 
}