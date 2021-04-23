<?php

class Sale extends Controller
{
    public function index()
    {
        $data['title'] = 'Application';
        $data['app'] = 'active';
        $data['product'] = $this->model('Product_model')->getAllpr();
        $this->view('templates/navbar4', $data);
        $this->view('transaction/sale', $data);
        $this->view('templates/footer4');
    }

    public function date()
    {
        $this->view('transaction/jam');
    }

    public function add()
    {
        if ($this->model('Sale_model')->add($_POST)>0) {
            header('Location: '.BASEURL.'');
        }
    }
    
    public function viewTr()
    {
        $data['product'] = $this->model('Sale_model')->viewTb();
        // var_dump($data['product']); die;
        $this->view('transaction/table', $data);
    }
    
    public function ttl1()
    {
        $data['product'] = $this->model('Sale_model')->viewTb();
        $data['oto'] = $this->model('Sale_model')->Oto();
        // var_dump($data['product']); die;
        $this->view('transaction/ttl1', $data);
    }
    public function ttl2()
    {
        $data['product'] = $this->model('Sale_model')->viewTb();
        // var_dump($data['product']); die;
        $this->view('transaction/ttl2', $data);
    }

    public function invoice()
    {
        $this->view('transaction/invoice');
    }
    
    public function delAll()
    {
        if ($this->model('Sale_model')->delAll($_POST)>0) {
            echo "<script>alert('Transaksi dibatalkan')</script>";
            echo "<script>window.location = 'http://localhost/mvcelearning/public/sale' </script>";
        } else {
            header('Location: '.BASEURL.'/sale');
        }
    }

    public function modal()
    {
        $data['product'] = $this->model('Sale_model')->getProduct();
        $this->view('transaction/modal', $data);
    }

    public function proses()
    {
        if ($this->model('Sale_model')->proses($_POST)>0) {
            $data['tes'] = $this->model('Sale_model')->proses();
            
            var_dump($data['tes']);
        }
    }

    public function print()
    {
        if ($this->model('Sale_model')->print($_POST)>0) {
            $data['pdf'] = $this->model('Sale_model')->print();

            //var_dump($data['pdf']);die;
            $_SESSION['pdf'] = $data['pdf'];
        }
    }
}