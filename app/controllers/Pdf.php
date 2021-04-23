<?php


class Pdf extends Controller
{
    // public function invoice()
    // {
    //     //$data['pdf'] = $this->model('Sale_model')->print();
    //     $this->view('pdf/invoice');
    // }

    public function tcpdf()
    {
        $this->view('pdf/tcpdf');
    }

    public function card($data = '', $alamat = '')
    {
        var_dump($data);
        die;
        $this->view('pdf/card', $data);
    }

    public function cardget()
    {
        $data = $this->model('User_model')->card($_POST);
        if (!$data) {
            header('Location: ' . BASEURL . '/user/member');
        } else {

            // var_dump($data);
            $this->view('pdf/card', $data);
        }
    }

    public function cardget2($id)
    {
        if ($this->model('User_model')->card($id > 0)) {
            // $data['card'] = $this->model('User_model')->card();
            $this->view('pdf/card');
        }
    }

    public function product()
    {
        $data['pdf'] = $this->model('Product_model')->print();
        $this->view('pdf/product', $data);
    }
}
