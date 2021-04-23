<?php

class Sale_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function add($data)
    {
        $code = $_POST['code'];
        $cek = $_POST['cek']; //status
        $qty = $_POST['qty'];
        $inv = $_POST['inv_1'];


        $this->db->query('SELECT * FROM produk WHERE code=:code ');
        $this->db->bind('code', $code);

        $this->db->execute();
        $data = $this->db->single();

        $name = $data['name'];
        $price = $data['price'];
        $stock = $data['stock'];
        $stockdel = $stock - $qty;
        $date = date('Y-m-d');

        $set = $this->db->rowCount();


        if ($set > 0) {
            $this->db->query('UPDATE produk SET stock=:stock WHERE code=:code');
            $this->db->bind('stock', $stockdel);
            $this->db->bind('code', $code);

            $this->db->execute();

            $set = $this->db->rowCount();

            /*if ($cek == "umum") {

                $this->db->query('SELECT * FROM temp WHERE code=:code');

                $this->db->bind('code',$code);

                $this->db->execute();

                $data1 = $this->db->single();

                $stock2 = $data1['qty'];

                $stock1 = $stock2 + $qty;

                $cek1 = $this->db->rowCount();

                if ($cek1 > 0){

                    $this->db->query('UPDATE temp SET qty=:qty WHERE code=:code');

                    $this->db->bind('qty', $stock1);

                    $this->db->bind('code',$code);

                    $this->db->execute();


                }else{

                    $dsc = 0;
                    $query = "INSERT INTO temp VALUES (:code, :name, :price, :qty, :dsc)";
                    $this->db->query($query);

                    $this->db->bind('code', $code);
                    $this->db->bind('name', $name);
                    $this->db->bind('price', $price);
                    $this->db->bind('qty', $qty);
                    $this->db->bind('dsc', $dsc);

                    $this->db->execute();
                }
            } else { */
            if ($set > 0) {
                $this->db->query('SELECT * FROM temp WHERE code=:code');

                $this->db->bind('code', $code);

                $this->db->execute();

                $data1 = $this->db->single();

                $stock2 = $data1['qty'];

                $stock1 = $stock2 + $qty;

                $cek1 = $this->db->rowCount();

                if ($cek1 > 0) {
                    $this->db->query('UPDATE temp SET qty=:qty WHERE code=:code');

                    $this->db->bind('qty', $stock1);

                    $this->db->bind('code', $code);

                    $this->db->execute();
                } else {
                    $dsc = 0.15;
                    $this->db->query('SELECT max(id) as newId FROM temp');
                    $this->db->execute();
                    $newId = $this->db->single();
                    $newId = $newId['newId'] + 1;
                    $query = "INSERT INTO temp VALUES (:id ,:inv ,:code, :name, :price, :qty, :date)";
                    $this->db->query($query);

                    $this->db->bind('id', $newId);
                    $this->db->bind('inv', $inv);
                    $this->db->bind('code', $code);
                    $this->db->bind('name', $name);
                    $this->db->bind('price', $price);
                    $this->db->bind('qty', $qty);
                    $this->db->bind('date', $date);
                    // $this->db->bind('dsc', $dsc);

                    $this->db->execute();
                    //}
                }
            }
        }
    }

    public function Oto()
    {
        $this->db->query('SELECT MAX(invoice) as inv FROM transaksi ');
        $this->db->execute();

        return $this->db->single();
    }

    public function viewTb()
    {
        $this->db->query('SELECT * FROM temp');

        return $this->db->resultSet();
    }

    public function inselect()
    {
        $query = "INSERT INTO transaksi (invoice,code,name,price,qty,date) SELECT invoice,code,name,price,qty,date FROM temp";
        $this->db->query($query);

        $this->db->execute();

        $set = $this->db->rowCount();

        if ($set > 0) {
        }
    }

    public function delAll()
    {
        $query = "SELECT * FROM temp";
        $this->db->query($query);

        $this->db->execute();

        $set = $this->db->resultSet();
        $set1 = $this->db->rowCount();
        if ($set1 > 0) {
            foreach ($set as $temp) {


                // var_dump($temp['code']);


                $qty = $temp['qty'];
                $this->db->query('SELECT stock FROM produk WHERE code=:code');
                $this->db->bind('code', $temp['code']);

                $this->db->execute();
                $set = $this->db->single();

                $stock = $qty + $set['stock'];
                //var_dump($set['stock'],'+',$qty,'=',$stock,'||');
                $set2 = $this->db->rowCount();

                if ($set2 > 0) {
                    $this->db->query('UPDATE produk SET stock=:stock WHERE code=:code');
                    $this->db->bind('stock', $stock);
                    $this->db->bind('code', $temp['code']);

                    $this->db->execute();
                    $set3 = $this->db->rowCount();

                    if ($set3 > 0) {
                        $this->db->query('DELETE FROM temp WHERE code=:code');
                        $this->db->bind('code', $temp['code']);

                        $this->db->execute();
                        $set4 = $this->db->rowCount();

                        if ($set4 > 0) {
                            Flasher::setFlash('', '', 'Proses', 'dibatalkan', 'danger');
                            header('Location: ' . BASEURL . '/sale');
                            // echo "<script>alert('Transaksi dibatalkan')</script>";
                            // echo "<script>window.location = 'http://localhost/mvcelearning/public/sale' </script>";
                        }
                    }
                }
            }
        }
    }

    public function proses()
    {
        date_default_timezone_set('Asia/Makassar');

        $dsc = $_POST['dsc-fix'];
        $inv_1 = $_POST['invoice'];
        $ttl_fix = $_POST['ttl-fix'];
        $cash = $_POST['cash-fix'];
        $cust = $_POST['csm-fix'];
        $query1 = "SELECT * FROM temp";
        $this->db->query($query1);
        $qty_ttl = 0;

        $this->db->execute();

        $set = $this->db->resultSet();
        $set1 = $this->db->rowCount();
        if ($set1 > 0) {
            foreach ($set as $temp) {
                $inv = $temp['invoice'];
                $code = $temp['code'];
                $name = $temp['name'];
                $price = $temp['price'];
                $qty = $temp['qty'];

                $qty_ttl += $qty;

                $this->db->query('SELECT MAX(id) AS newId FROM transaksi');
                $this->db->execute();
                $newId = $this->db->single();
                $newId = $newId['newId'] + 1;


                $query = ("INSERT INTO transaksi VALUES (:id ,:inv, :code, :name, :price, :qty, :date, :dsc)");
                $this->db->query($query);

                $this->db->bind('id', $newId);
                $this->db->bind('inv', $inv);
                $this->db->bind('code', $code);
                $this->db->bind('name', $name);
                $this->db->bind('price', $price);
                $this->db->bind('qty', $qty);
                $this->db->bind('date', $temp['date']);
                $this->db->bind('dsc', $dsc);

                $this->db->execute();

                $set = $this->db->rowCount();

                if ($set > 0) {
                    $this->db->query('DELETE FROM temp WHERE id=:id');
                    $this->db->bind('id', $temp['id']);

                    $this->db->execute();
                    $set = $this->db->rowCount();

                    // if($set > 0){

                    //     header('Location: '.BASEURL.'/pdf/invoice');
                    // }
                }
            }
            $this->db->query('SELECT MAX(id) AS newId FROM customer');
            $this->db->execute();
            $newId = $this->db->single();
            $newId = $newId['newId'] + 1;

            $query = ("INSERT INTO customer VALUES (:id ,:inv, :cust, :ttl,:qty, :cash, :date)");

            $this->db->query($query);

            $this->db->bind('id', $newId);
            $this->db->bind('inv', $inv_1);
            $this->db->bind('cust', $cust);
            $this->db->bind('ttl', $ttl_fix);
            $this->db->bind('qty', $qty_ttl);
            $this->db->bind('cash', $cash);
            $this->db->bind('date', date('Y-m-d H:i:s'));


            $this->db->execute();
        }
    }

    //get product stock >0
    public function getProduct()
    {
        $query = "SELECT * FROM produk WHERE stock > 0";

        $this->db->query($query);
        $this->db->execute();

        return  $this->db->resultSet();
    }
    //get product stock >0

    //print
    public function print()
    {
        $inv = $_POST['invoice'];


        if ($inv !== '') {
            $_SESSION['inv'] = $_POST['invoice'];

            // var_dump($_SESSION['inv']);die;

            // $query = "SELECT transaksi.invoice, transaksi.code, transaksi.name, transaksi.price, transaksi.qty, customer.date, transaksi.dsc, customer.cust_name, customer.cash FROM customer, transaksi WHERE customer.invoice=:invoice AND transaksi.invoice=:invoice";

            $query = "SELECT transaksi.invoice, transaksi.code, transaksi.name, transaksi.price, transaksi.qty, customer.date, transaksi.dsc, customer.cust_name, customer.cash FROM customer, transaksi WHERE customer.invoice=:invoice AND transaksi.invoice=:invoice";
            $this->db->query($query);

            $this->db->bind('invoice', $_SESSION['inv']);

            $this->db->execute();

            //return $this->db->rowCount();
            return $this->db->resultSet();
        } else {
            $_SESSION['inv'] = $_SESSION['inv'];



            // var_dump($_SESSION['inv']);die;

            $query = "SELECT transaksi.invoice, transaksi.code, transaksi.name, transaksi.price, transaksi.qty, transaksi.date, transaksi.dsc, customer.cust_name, customer.cash FROM customer, transaksi WHERE customer.invoice=:invoice AND transaksi.invoice=:invoice";
            $this->db->query($query);

            $this->db->bind('invoice', $_SESSION['inv']);

            $this->db->execute();

            //return $this->db->rowCount();
            return $this->db->resultSet();
        }
    }
    //print


    //scan user

    public function scan_user($id_user)
    {
        $query = "SELECT * FROM user_login WHERE qrcode=:qrcode";
        $this->db->query($query);
        $this->db->bind('qrcode', $id_user);

        $this->db->execute();


        return $this->db->single();
    }
}
