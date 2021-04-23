<?php

class Stock_out_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function show()
    {
        $this->db->query('SELECT * FROM stock_out');
        return $this->db->resultSet();
    }

    public function add()
    {
        $code = $_POST['code'];
        $name = $_POST['name'];
        $stock_out = $_POST['stock_out'];
        $info = $_POST['info'];
        $stock = $_POST['stock'];
        $date = $_POST['date-so'];

        $stock_up = $stock - $stock_out;

        if ($stock <= 0) {
            echo "<script>alert('Stock barang habis')</script>";
            echo "<script>window.location = 'http://localhost/mvcelearning/public/stock_out'</script>";
        } else {
            if ($stock < $stock_out) {
                echo "<script>alert('Stock out lebih banyak dari pada stock barang ')</script>";
                echo "<script>window.location = 'http://localhost/mvcelearning/public/stock_out'</script>";
            } else {
                $this->db->query('SELECT stock FROM produk WHERE code=:code');
                $this->db->bind('code', $code);

                $this->db->execute();

                $prod = $this->db->single();
                $stock_first = $prod['stock'];

                $set4 = $this->db->rowCount();

                if ($set4 > 0) {
                    $this->db->query('SELECT MAX(id) as newId FROM stock_out');
                    $this->db->execute();
                    $newId = $this->db->single();
                    $newId = $newId['newId'] + 1;

                    $query = "INSERT INTO stock_out VALUES (:newId ,:code, :name, :stock_out, :info, :date, :stock_first)";
                    $this->db->query($query);

                    $this->db->bind('newId', $newId);
                    $this->db->bind('code', $code);
                    $this->db->bind('name', $name);
                    $this->db->bind('stock_out', $stock_out);
                    $this->db->bind('info', $info);
                    $this->db->bind('date', $date);
                    $this->db->bind('stock_first', $stock_first);

                    $this->db->execute();

                    $set = $this->db->rowCount();

                    if ($set > 0) {
                        $this->db->query('UPDATE produk SET stock=:stock WHERE code=:code');
                        $this->db->bind('stock', $stock_up);
                        $this->db->bind('code', $code);

                        $this->db->execute();
                        return $this->db->rowCount();
                    }
                }
            }
        }
    }

    //del data
    public function del($id)
    {
        $this->db->query('SELECT * FROM stock_out WHERE id=:id');
        $this->db->bind('id', $id);

        $this->db->execute();
        $data = $this->db->single();

        $set = $this->db->rowCount();
        $code = $data['code'];
        $stock_out = $data['stock_out'];

        if ($set > 0) {
            $this->db->query('SELECT stock FROM produk WHERE code=:code');
            $this->db->bind('code', $code);
            $this->db->execute();
            $product = $this->db->single();
            $set2 = $this->db->rowCount();
            $stock = $product['stock'];

            if ($set2 > 0) {
                $stcok_up = $stock + $stock_out;

                $this->db->query('UPDATE produk SET stock=:stock WHERE code=:code');
                $this->db->bind('stock', $stcok_up);
                $this->db->bind('code', $code);

                $this->db->execute();

                $set3 = $this->db->rowCount();

                if ($set3 > 0) {

                    $this->db->query('DELETE FROM stock_out WHERE id=:id');
                    $this->db->bind('id', $id);

                    $this->db->execute();
                    return $this->db->rowCount();
                }
            }
        }
    }
    //end del data

    //edit show
    public function editshow($id)
    {

        $this->db->query('SELECT * FROM stock_out WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }
    //edit show

    //update
    public function up()
    {

        $id = $_POST['modal-id'];
        $code = $_POST['modal-code'];
        $name = $_POST['modal-name'];
        $out = $_POST['modal-out'];
        $info = $_POST['modal-info'];
        $date = $_POST['modal-date'];
        $stock = $_POST['modal-stock-product'];
        $code1 = $_POST['modal-code-product'];
        $out_first = $_POST['modal-out-first'];
        $stock_first = $_POST['modal-stock-first'];

        $stock5 = $out - $out_first;
        $stock6 = $stock - $stock5;


        //aritmatika
        $stock1 = $stock - $out;
        //var_dump($stock,'-',$out,'=',$stock1); die;

        $query = "UPDATE stock_out SET code=:code, name=:name, stock_out=:stock_out, info=:info, date=:date, stock_first=:stock_first WHERE id=:id";

        $this->db->query($query);

        $this->db->bind('code', $code);
        $this->db->bind('name', $name);
        $this->db->bind('stock_out', $out);
        $this->db->bind('info', $info);
        $this->db->bind('date', $date);
        $this->db->bind('stock_first', $stock);
        $this->db->bind('id', $id);

        $this->db->execute();

        $set = $this->db->rowCount();

        if ($set > 0) {

            if ($code != $code1) {

                $this->db->query('UPDATE produk SET stock=:stock WHERE code=:code');

                $this->db->bind('stock', $stock1);
                $this->db->bind('code', $code);

                $this->db->execute();
                $set1 = $this->db->rowCount();

                if ($set1 > 0) {

                    $this->db->query('SELECT stock FROM produk WHERE code=:code');

                    $this->db->bind('code', $code1);
                    $this->db->execute();
                    $stock3 = $this->db->single();

                    $stock2 = $stock3['stock'] + $out_first;

                    $set2 = $this->db->rowCount();

                    if ($set2 > 0) {

                        $this->db->query('UPDATE produk SET stock=:stock WHERE code=:code');
                        $this->db->bind('stock', $stock2);
                        $this->db->bind('code', $code1);
                        $this->db->execute();
                        return $this->db->rowCount();
                    }
                }
            } else {

                $this->db->query('UPDATE produk SET stock=:stock WHERE code=:code');

                $this->db->bind('stock', $stock6);
                $this->db->bind('code', $code);

                $this->db->execute();
                Flasher::setFlash('', '', 'Update', 'Succesfully', 'success');
                header('Location: ' . BASEURL . '/stock_out');
                return $this->db->rowCount();
            }
        }
    }
    //update
}
