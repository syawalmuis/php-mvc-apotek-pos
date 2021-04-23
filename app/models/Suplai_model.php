<?php

class Suplai_model
{


    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }


    public function getProductCode()
    {

        $this->db->query('SELECT code, name, stock FROM produk');

        $this->db->execute();

        return $this->db->resultSet();
    }

    public function getProductName($code)
    {

        $this->db->query('SELECT * FROM produk WHERE code=:code');

        $this->db->bind('code', $code);


        return $this->db->single();
    }
    public function getSuppDetail($id_supp)
    {

        $this->db->query('SELECT * FROM supplier WHERE id_supp=:id_supp');

        $this->db->bind('id_supp', $id_supp);

        $this->db->execute();
        return $this->db->single();
        return $this->db->rowCount();
    }

    public function add()
    {
        $supp = $_POST['supp-name'];
        $code = $_POST['code-product'];
        $name = $_POST['name-product'];
        $stock = $_POST['stock'];
        $addr = $_POST['addr-supp'];
        $date = $_POST['date-supp'];
        $note = $_POST['note-supp'];
        $stock_first = $_POST['stock-awal'];

        $this->db->query('SELECT MAX(id_supp) as newId FROM supplier');
        $this->db->execute();
        $data = $this->db->single();
        $newId = $data['newId'] + 1;

        $query = "INSERT INTO supplier VALUES (:id, :supp_name, :code, :name, :supp_addr, :supp_date, :supp_note, :stock_supp, :stock_first)";
        $this->db->query($query);

        $this->db->bind('id', $newId);
        $this->db->bind('supp_name', $supp);
        $this->db->bind('code', $code);
        $this->db->bind('name', $name);
        $this->db->bind('supp_addr', $addr);
        $this->db->bind('supp_date', $date);
        $this->db->bind('supp_note', $note);
        $this->db->bind('stock_supp', $stock);
        $this->db->bind('stock_first', $stock_first);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateStock()
    {

        $code = $_SESSION['code'];
        $stock_first = $_SESSION['stock_first'];
        $stock = $_SESSION['stock'];

        $stock_end = $stock + $stock_first;


        if ($stock_end > 0) {
            $this->db->query('UPDATE produk SET  stock =:stock WHERE code=:code');

            $this->db->bind('stock', $stock_end);
            $this->db->bind('code', $code);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function getSupp()
    {

        $this->db->query('SELECT * FROM supplier');

        $this->db->execute();
        return $this->db->resultSet();
    }


    public function delbyId($supp)
    {

        $this->db->query('DELETE * FROM supplier WHERE id_supp =: id_supp');

        $this->db->bind('id_supp', $supp);

        $this->db->execute();
        $this->db->rowCount();
    }

    public function updateStockdel($code)
    {


        $stock_product = $_SESSION['product']['stock'];
        $stock_supp = $_SESSION['supp']['stock_supp'];
        $stock_del = $stock_product - $stock_supp;


        $this->db->query('UPDATE produk SET  stock =:stock WHERE code=:code');

        $this->db->bind('stock', $stock_del);
        $this->db->bind('code', $code);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delSupp($id)
    {

        $this->db->query('DELETE FROM supplier WHERE id_supp = ' . $id . '');

        $this->db->execute();
        return $this->db->rowCount();
    }


    //edit supplier
    public function upSupp()
    {

        $id_supp = $_POST['modal-id-supp'];
        $supp_name = $_POST['modal-supp-name'];
        $code = $_POST['modal-product-code'];
        $name = $_POST['modal-product-name'];
        $stock = $_POST['modal-product-stock']; //stock di product
        $supp_date = $_POST['modal-supp-date'];
        $supp_addr = $_POST['modal-supp-addr'];
        $supp_note = $_POST['modal-supp-note'];
        $stock_supp = $_POST['modal-stock-in']; //stock yg di input
        $stock_first_supp = $_POST['stock-first-supp']; //stock di data stock_in setelah di ubah


        $stock_first = $_POST['stock-first']; //stock awal produk

        $stock_4 = $_POST['stock-end'];
        $code_1 = $_POST['code_1'];
        $stock_1 = $stock_4 - $stock_first;
        $stock_2 = $stock - $stock_1;

        $stock_5 = $stock_supp + $stock;

        $stock12 = $stock_first_supp  + $stock_first;

        $stock9 = $stock12 - $stock_first_supp - $stock_first;

        $stock13 = $stock9 - $stock_first;
        $stock10 = $stock13 + $stock;

        $stock11 =  $stock_supp + $stock10;
        //var_dump($stock11); die;//var_dump($stock9, $stock10, $stock11); die;


        $this->db->query('UPDATE supplier SET supp_name=:supp_name, code=:code, name=:name, supp_addr=:supp_addr, supp_date=:supp_date, supp_note=:supp_note, stock_supp=:stock_supp WHERE id_supp=:id_supp');

        $this->db->bind('supp_name', $supp_name);
        $this->db->bind('code', $code);
        $this->db->bind('name', $name);
        $this->db->bind('supp_addr', $supp_addr);
        $this->db->bind('supp_date', $supp_date);
        $this->db->bind('supp_note', $supp_note);
        $this->db->bind('stock_supp', $stock_supp);
        //$this->db->bind('stock_first', $stock);
        $this->db->bind('id_supp', $id_supp);

        $this->db->execute();

        $set = $this->db->rowCount();

        if ($set > 0) {
            if ($code !== $code_1) {
                $query3 = "UPDATE produk SET stock=:stock WHERE code=:code";
                $this->db->query($query3);

                $this->db->bind('stock', $stock_5);
                $this->db->bind('code', $code);
                $this->db->execute();

                $set1 = $this->db->rowCount();

                if ($set1 > 0) {
                    $this->db->query('SELECT stock FROM produk WHERE code=:code');

                    $this->db->bind('code', $code_1);
                    $this->db->execute();

                    $data = $this->db->single();

                    $stock_change = $data['stock'];

                    $stock_6 = $stock_4 - $stock_first_supp;
                    $stock_7 = $stock_change - $stock_6;
                    $stock8 = $stock_7 - $stock_first_supp;



                    $set3 = $this->db->rowCount();

                    if ($set3 > 0) {

                        $query4 = "UPDATE produk SET stock=:stock WHERE code=:code";
                        $this->db->query($query4);

                        $this->db->bind('stock', $stock8);
                        $this->db->bind('code', $code_1);
                        $this->db->execute();

                        $set5 = $this->db->rowCount();

                        if ($set5 > 0) {

                            $this->db->query('UPDATE supplier SET stock_first=:stock_first WHERE id_supp=:id_supp');

                            $this->db->bind('stock_first', $stock);
                            $this->db->bind('id_supp', $id_supp);

                            $this->db->execute();

                            return $this->db->rowCount();
                        }
                    }
                }
            } else {

                $query2 = "UPDATE produk SET stock=:stock WHERE code=:code";



                $this->db->query($query2);


                $this->db->bind('stock', $stock11);
                $this->db->bind('code', $code);
                $this->db->execute();

                header('Location: ' . BASEURL . '/suplai');

                return $this->db->rowCount();
            }
        }
    }
    //end edit supplier

    // public function upProduct(){
    //     $stock_first = $_SESSION['stock_first'] ;
    //     $code = $_SESSION['code'] ; 
    //     $stock_in = $_SESSION['stock'] ; 
    //     $stock_product = $_SESSION['stock_product'];
    //     $stock_end = $_SESSION['stock_end'];

    //     $stock_1 = $stock_end - $stock_product;
    //     $stock_end2 = $stock_1 + $stock_in;

    //     if ($stock_end2 >= 0){



    //         $query = "UPDATE produk SET stock=:stock WHERE code=:code";

    //         $this->db->query($query);

    //         $this->db->bind('stock', $stock_end);
    //         $this->db->bind('code', $code);

    //         $this->db->execute();
    //         return $this->db->rowCount();

    //     }


    // }

    //get supp data
    public function getSuppData()
    {

        $this->db->query('SELECT * FROM supp_data');
        $this->db->execute();

        return $this->db->resultSet();
    }
    //end get supp data

    public function getAddr($supp_name)
    {

        $this->db->query('SELECT * FROM supp_data WHERE supp_name=:supp_name');

        $this->db->bind('supp_name', $supp_name);
        $this->db->execute();

        return $this->db->single();
    }


    public function addscan()
    {
    }
}
