<?php


class Getqrcode extends Controller
{
    public function productload()
    {
        $this->view('qrcode/barang');
    }

    public function scan_prdk()
    {
        if ($this->model('Sale_model')->add($_POST) > 0) {
            header('Location: ' . BASEURL . '');
        }
    }

    public function scan_user()
    {
        echo json_encode($this->model('Sale_model')->scan_user($_POST['id_user']));
    }


    public function generate()
    {
        $this->view('qrcode/generator');
    }
}
