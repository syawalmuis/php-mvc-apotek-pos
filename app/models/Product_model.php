<?php

class Product_model
{
    /*private $pr = [
        [
            "nama" => "bodrex",
            "Category" => "Batuk & Flu"
        
        ],
        [
            "nama" => "bodrex & flu",
            "Category" => "Batuk & Flu"
        
        ]
        ];*/


    private $table = 'produk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllpr()
    {

        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getProductbyId($code)
    {

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE code=:code');

        $this->db->bind('code', $code);
        return $this->db->single();
    }

    public function codeOtomatis()
    {

        $tes = "SELECT MAX(code) as kodeTerbesar FROM produk";
        $this->db->query($tes);

        $this->db->execute();
        return $this->db->single();
    }

    public function addProduct()
    {
        //var_dump($_FILES);die;
        function upload()
        {

            $nameFile = $_FILES['img']['name'];
            $size = $_FILES['img']['size'];
            $error = $_FILES['img']['error'];
            $tmp_name = $_FILES['img']['tmp_name'];

            //apakah ada gambar di upload;

            if ($error === 4) {
                echo "<script>
                        alert('pilih gambar terlebih dahulu');
                        </script>";
                return
                    false;
            }

            //cek gambar atau bukan
            $ekstensi = ['jpg', 'jpeg', 'png', 'gif'];
            $ekstensiImg = explode('.', $nameFile);
            $ekstensiImg = strtolower(end($ekstensiImg));

            if (!in_array($ekstensiImg, $ekstensi)) {
                echo "<script>
                alert('Yang anda upload bukan gambar');
                </script>";
                return false;
            }

            //cek ukuran gambar
            if ($size > 2000000) {
                echo "<script>
                alert('ukuran gambar terlalu besar');
                </script>";
                return false;
            }

            //lolos pengecekan
            $name = $_POST['name'];
            $tmp = explode('.', $nameFile);
            $date = date("Y-m-d");
            $unik = uniqid();
            //var_dump($name.'_'.$unik.'-'.$date.'.'.end($tmp)); die;


            move_uploaded_file($tmp_name, 'img/product/' . $name . '_' . $unik . '-' . $date . '.' . end($tmp));
            //var_dump($tes); die;
            return ($name . '_' . $unik . '-' . $date . '.' . end($tmp));
        }

        $code = $_POST['code'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $type = $_POST['type'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];

        $info = $_POST['info'];
        $stock = 0;

        //upload gambar dulu
        $img = upload();
        if (!$img) {
            return false;
        }


        $value = 0;
        $lvl = 'member';
        $query = "INSERT INTO produk values ( :code, :name, :category, :type, :unit, :price, :stock, :info, :image, :value)";

        $this->db->query($query);

        $this->db->bind('code', $code);
        $this->db->bind('name', $name);
        $this->db->bind('category', $category);
        $this->db->bind('type', $type);
        $this->db->bind('unit', $unit);
        $this->db->bind('price', $price);
        $this->db->bind('stock', $stock);
        $this->db->bind('info', $info);
        $this->db->bind('image', $img);
        $this->db->bind('value', $value);

        $codeContent = $code;

        $tempdir = "img/qrcode/product/"; //Nama folder tempat menyimpan file qrcode
        if (!file_exists($tempdir)) { //Buat folder bername temp
            mkdir($tempdir);
        }

        $level = QR_ECLEVEL_H;
        //Ukuran pixel
        $UkuranPixel = 6;
        //Ukuran frame
        $UkuranFrame = 4;

        QRcode::png($codeContent, $tempdir . $codeContent . '.png', $level, $UkuranPixel, $UkuranFrame);

        //QRcode::png($codeContent,$temp.'002qr.png');



        $this->db->execute();

        $set = $this->db->rowCount();
        if ($set > 0) {
            $query = "SELECT username FROM user_login WHERE level=:lvl";
            $this->db->query($query);

            $this->db->bind('lvl', $lvl);
            $this->db->execute();

            $data['username'] = $this->db->resultSet();
            // var_dump($data['username']);die;
            $set = $this->db->rowCount();

            if ($set > 0) {
                foreach ($data['username'] as $usr) {
                    $this->db->query('SELECT MAX(id) as newId FROM like_product');
                    $this->db->execute();
                    $newId = $this->db->single();
                    $newId = $newId['newId'] + 1;

                    $query = "INSERT INTO like_product VALUES (:id, :code, :usr, :val)";
                    $this->db->query($query);
                    $this->db->bind('id', $newId);
                    $this->db->bind('code', $code);
                    $this->db->bind('usr', $usr['username']);
                    $this->db->bind('val', $value);

                    $this->db->execute();
                }
            } else {
                return true;
            }
            return $this->db->rowCount();
        } else {
            return $this->db->rowCount();
        }
    }


    public function deleteProduct($code)
    {

        $this->db->query('SELECT image FROM produk WHERE code=:code');
        $this->db->bind('code', $code);

        $this->db->execute();
        $data = $this->db->single();
        $imgLama = $data['image'];

        $set = $this->db->rowCount();

        if ($set > 0) {
            unlink('img/product/' . $imgLama);
            unlink('img/qrcode/product/' . $code . '.png');
            $query = "DELETE FROM produk WHERE code=:code";
            $this->db->query($query);

            $this->db->bind('code', $code);
            $this->db->execute();

            $set = $this->db->rowCount();

            if ($set > 0) {
                $this->db->query('DELETE FROM like_product WHERE code=:code');
                $this->db->bind('code', $code);

                $this->db->execute();
                return $this->db->rowCount();
            }
        }
    }

    public function editProduct($data)
    {
        $imgLama = $_POST['img-hide'];

        function Upupload()
        {


            $nameFile = $_FILES['img']['name'];
            $size = $_FILES['img']['size'];
            $error = $_FILES['img']['error'];
            $tmp_name = $_FILES['img']['tmp_name'];

            //apakah ada gambar di upload;

            if ($error === 4) {
                echo "<script>
                        alert('pilih gambar terlebih dahulu');
                        </script>";
                return
                    false;
            }

            //cek gambar atau bukan
            $ekstensi = ['jpg', 'jpeg', 'png'];
            $ekstensiImg = explode('.', $nameFile);
            $ekstensiImg = strtolower(end($ekstensiImg));

            if (!in_array($ekstensiImg, $ekstensi)) {
                echo "<script>
                alert('Yang anda upload bukan gambar');
                </script>";
                return false;
            }

            //cek ukuran gambar
            if ($size > 2000000) {
                echo "<script>
                alert('ukuran gambar terlalu besar');
                </script>";
                return false;
            }

            //lolos pengecekan
            $name = $_POST['name'];
            $tmp = explode('.', $nameFile);
            $date = date("Y-m-d");
            $unik = uniqid();
            //var_dump($name.'_'.$unik.'-'.$date.'.'.end($tmp)); die;


            move_uploaded_file($tmp_name, 'img/product/' . $name . '_' . $unik . '-' . $date . '.' . end($tmp));
            //var_dump($tes); die;
            return ($name . '_' . $unik . '-' . $date . '.' . end($tmp));
        }

        if ($_FILES['img']['error'] === 4) {
            $img = $imgLama;
        } else {
            unlink('img/product/' . $imgLama);
            $img = Upupload();
        }



        $query = "UPDATE produk SET  
                        
                        name=:name, 
                        category=:category, 
                        type=:type, 
                        unit=:unit, 
                        price=:price, 
                        info=:info,
                        image=:image
                        WHERE code=:code";


        $this->db->query($query);

        $this->db->bind('name', $data['name']);
        $this->db->bind('category', $data['category']);
        $this->db->bind('type', $data['type']);
        $this->db->bind('unit', $data['unit']);
        $this->db->bind('price', $data['price']);
        $this->db->bind('info', $data['info']);
        $this->db->bind('code', $data['code']);
        $this->db->bind('image', $img);


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function addProses()
    {
        $code = $_POST['code'];
        $tes = 'Tes';
        $query = "INSERT INTO contoh values (:code, :tes)";
        $this->db->query($query);

        $this->db->bind('code', $code);
        $this->db->bind('tes', $tes);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function print()
    {
        $this->db->query('SELECT * FROM produk');
        $this->db->execute();

        return $this->db->resultSet();
    }
}
