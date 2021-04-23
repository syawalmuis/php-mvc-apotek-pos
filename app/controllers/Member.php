<?php

class Member extends Controller
{
    public function index()
    {
        $data['home']='active';
        $data['title']='Home';
        $data['product'] = $this->model('Product_model')->getAllpr();
        $this->view('templates/navbarm', $data);
        $this->view('member/index');
        $this->view('templates/footer4');
    }

    public function show()
    {
        // $data['like'] = $this->model('Like_model')->getUser();
        // if(!$data['like']){
        //     $data['like'] = array(array('value' => 0));
        // }
        $data['product'] = $this->model('Like_model')->get();
        $data['url'] = "show";
        $this->view('member/cat', $data);
    }

    public function categorySet(){

        ($this->model('Like_model')->getCategory($_POST)>0);
    }

    public function category(){

       // if ($this->model('Like_model')->getCategory($_GET) > 0) {
        $data['product'] = $this->model('Like_model')->getCategory2();
        $data['url'] = "category";
            //$data['product'] = $this->model('Like_model')->getCategory();
        $this->view('member/cat', $data);
       // }
    }
    
     public function searchpost(){
       
            $data['product'] = $this->model('Like_model')->searchpost();
            $data['url'] = "searchpost";
            $this->view('member/cat',$data);
    }


    public function searchsesi(){
        ($this->model('Like_model')->searchsesi($_POST));
    }

    // public function categorySet1()
    // {
    //     echo json_encode($this->model('Like_model')->getCategory1($_POST)) ;
    // }

    // public function tes34()
    // {
    //     $data = $this->categorySet1();

    //     var_dump($data);
    // }

    // public function category()
    // {

    //    // if ($this->model('Like_model')->getCategory($_GET) > 0) {
    //     $data['product'] = $this->model('Like_model')->getCategory2();
    //     //$data['product'] = $this->model('Like_model')->getCategory();
    //     $this->view('member/cat', $data);
    //     // }
    // }

    // public function searchpost()
    // {
    //     $data['product'] = $this->model('Like_model')->searchpost();
    //     $this->view('home/cat', $data);
    // }


    // public function searchsesi()
    // {
    //     ($this->model('Like_model')->searchsesi($_POST));
    // }
}