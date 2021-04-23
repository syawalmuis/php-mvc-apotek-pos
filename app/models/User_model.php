<?php

class User_model
{
    private $db;
    private $table = "user_login";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAdmin()
    {
        $admin = "admin";

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE level =:admin');

        $this->db->bind('admin', $admin);

        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getMember()
    {
        $member = "member";

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE level =:member ');

        $this->db->bind('member', $member);

        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getMemberbyId($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');

        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->single();
    }

    public function getAdminbyId($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');

        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->single();
    }



    public function saveAdmin()
    {
        $imgLama = $_POST['img-hide'];

        function UpuploadA()
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
            $name = $_POST['username'];
            $tmp = explode('.', $nameFile);
            $date = date("Y-m-d");
            $unik = uniqid();
            //var_dump($name.'_'.$unik.'-'.$date.'.'.end($tmp)); die;


            move_uploaded_file($tmp_name, 'img/user/' . $name . '_' . $unik . '-' . $date . '.' . end($tmp));
            //var_dump($tes); die;
            return ($name . '_' . $unik . '-' . $date . '.' . end($tmp));
        }

        if ($_FILES['img']['error'] === 4) {
            $img = $imgLama;
        } else {
            unlink('img/user/' . $imgLama);
            $img = UpuploadA();
        }

        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $alamat = $_POST['alamat'];
        $pass = $_POST['pass'];
        $level = 'admin';

        $this->db->query('UPDATE ' . $this->table . ' SET username=:username, email=:email, name=:name, password=:password, level=:level,  alamat=:alamat, image=:img WHERE id=:id');

        $this->db->bind('username', $username);
        $this->db->bind('email', $email);
        $this->db->bind('name', $name);
        $this->db->bind('password', $pass);
        $this->db->bind('level', $level);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('img', $img);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function saveMember()
    {
        $imgLama = $_POST['img-hide'];

        function UpuploadM()
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
            $name = $_POST['username'];
            $tmp = explode('.', $nameFile);
            $date = date("Y-m-d");
            $unik = uniqid();
            //var_dump($name.'_'.$unik.'-'.$date.'.'.end($tmp)); die;


            move_uploaded_file($tmp_name, 'img/user/' . $name . '_' . $unik . '-' . $date . '.' . end($tmp));
            //var_dump($tes); die;
            return ($name . '_' . $unik . '-' . $date . '.' . end($tmp));
        }

        if ($_FILES['img']['error'] === 4) {
            $img = $imgLama;
        } else {
            unlink('img/user/' . $imgLama);
            $img = UpuploadM();
        }

        $id = $_POST['id'];
        $usr = $_POST['usr-hide'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $alamat = $_POST['alamat'];
        $pass = $_POST['pass'];
        $level = 'member';

        $this->db->query('UPDATE ' . $this->table . ' SET username=:username, email=:email, name=:name, password=:password, level=:level,  alamat=:alamat, image=:image WHERE id=:id');

        $this->db->bind('username', $username);
        $this->db->bind('email', $email);
        $this->db->bind('name', $name);
        $this->db->bind('password', $pass);
        $this->db->bind('level', $level);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('image', $img);
        $this->db->bind('id', $id);

        $this->db->execute();

        $set = $this->db->rowCount();
        if ($set > 0) {
            if ($usr != $username) {
                $this->db->query('UPDATE like_product SET username=:user WHERE username=:usr');
                $this->db->bind('user', $username);
                $this->db->bind('usr', $usr);

                $this->db->execute();
                return $this->db->rowCount();
            } else {
                return true;
            }
        }
    }

    //delete Admin
    public function deleteAdmin($id)
    {
        $query = "SELECT image FROM user_login WHERE id=:id";

        $this->db->query($query);

        $this->db->bind('id', $id);

        $this->db->execute();

        $img = $this->db->single();

        $set = $this->db->rowCount();

        if ($set > 0) {
            unlink('img/user/' . $img['image']);

            $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');

            $this->db->bind('id', $id);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    //delete Member
    public function deleteMember($id)
    {
        $query = "SELECT * FROM user_login WHERE id=:id";

        $this->db->query($query);

        $this->db->bind('id', $id);

        $this->db->execute();

        $data = $this->db->single();
        $img = $data['image'];
        $del = $data['qrcode'];
        $usr = $data['username'];
        // print_r($del.'---'.$img);die;
        $set = $this->db->rowCount();

        if ($set > 0) {
            unlink('img/user/' . $img);
            // unlink('img/product/'.$imgLama);
            unlink('img/qrcode/user/' . $del . '.png');

            $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
            $this->db->bind('id', $id);
            $this->db->execute();
            $set = $this->db->rowCount();

            if ($set > 0) {

                $query = "SELECT * FROM like_product WHERE username=:usr";

                $this->db->query($query);
                $this->db->bind('usr', $usr);
                $this->db->execute();

                $data['usr'] = $this->db->resultSet();
                $set = $this->db->rowCount();
                if ($set > 0) {
                    foreach ($data['usr'] as $user) {
                        $this->db->query('SELECT * FROM produk WHERE code=:code');
                        $this->db->bind('code', $user['code']);

                        $this->db->execute();
                        $data['product'] = $this->db->resultSet();

                        $set = $this->db->rowCount();
                        if ($set > 0) {
                            foreach ($data['product'] as $product) {

                                $value = $product['value'] - $user['value'];
                                $this->db->query('UPDATE produk SET value=:value WHERE code=:code');

                                $this->db->bind('value', $value);
                                $this->db->bind('code', $user['code']);
                                $this->db->execute();
                            }
                        }
                    }
                    $set = $this->db->rowCount();
                    if ($set > 0) {
                        $query = 'DELETE FROM like_product WHERE username=:usr';
                        $this->db->query($query);

                        $this->db->bind('usr', $usr);
                        $this->db->execute();

                        return $this->db->rowCount();
                    } else {
                        $query = 'DELETE FROM like_product WHERE username=:usr';
                        $this->db->query($query);

                        $this->db->bind('usr', $usr);
                        $this->db->execute();

                        return $this->db->rowCount();
                    }
                }
            }
        }
    }

    // id otomatis
    public function idOtomatis()
    {
        $this->db->query('SELECT MAX(id) as idmax FROM  user_login');

        $this->db->execute();

        return $this->db->single();
    }



    public function addMemberModel()
    {
        function uploadMember()
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
            $username = $_POST['username'];
            $tmp = explode('.', $nameFile);
            $date = date("Y-m-d");
            $unik = uniqid();
            //var_dump($name.'_'.$unik.'-'.$date.'.'.end($tmp)); die;


            move_uploaded_file($tmp_name, 'img/user/' . $username . '_' . $unik . '-' . $date . '.' . end($tmp));
            //var_dump($tes); die;
            return ($username . '_' . $unik . '-' . $date . '.' . end($tmp));
        }

        //upload gambar dulu
        $img = uploadMember();
        if (!$img) {
            return false;
        }

        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $alamat = $_POST['alamat'];
        $pass = $_POST['pass'];
        $level = "member";
        $qr = $_POST['id'] . '-' . uniqid() . '_' . date('Y-m-d');

        $this->db->query('SELECT username FROM user_login WHERE username=:username');
        $this->db->bind('username', $username);
        $this->db->execute();
        $cek = $this->db->rowCount();
        if ($cek > 0) {
            header('Location: ' . BASEURL . '/user/member');
        } else {
            try {
                $this->db->query('INSERT INTO ' . $this->table . ' VALUES ( :id, :username, :email, :name, :password, :level,  :alamat, :image, :qr)');

                $this->db->bind('id', $id);
                $this->db->bind('username', $username);
                $this->db->bind('email', $email);
                $this->db->bind('name', $name);
                $this->db->bind('password', $pass);
                $this->db->bind('level', $level);
                $this->db->bind('alamat', $alamat);
                $this->db->bind('image', $img);
                $this->db->bind('qr', $qr);

                $this->db->execute();

                $codeContent = $qr;

                $tempdir = "img/qrcode/user/"; //Nama folder tempat menyimpan file qrcode
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


                $setr = $this->db->rowCount();
                if ($setr > 0) {
                    $this->db->query('SELECT code FROM produk');
                    $this->db->execute();

                    $set = $this->db->rowCount();

                    $data['pr'] = $this->db->resultSet();

                    if ($set > 0) {
                        foreach ($data['pr'] as $val) {

                            $value = 0;
                            $query = "INSERT INTO like_product (code,username,value) VALUES (:code, :usr, :val)";
                            $this->db->query($query);

                            $this->db->bind('code', $val['code']);
                            $this->db->bind('usr', $username);
                            $this->db->bind('val', $value);

                            $this->db->execute();
                        }
                    }
                    return $this->db->rowCount();
                }
            } catch (PDOException $e) {
                header('Location: ' . BASEURL . '/user/member');
            }
        }
    }

    public function addAdminModel()
    {
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
            $username = $_POST['username'];
            $tmp = explode('.', $nameFile);
            $date = date("Y-m-d");
            $unik = uniqid();
            //var_dump($name.'_'.$unik.'-'.$date.'.'.end($tmp)); die;


            move_uploaded_file($tmp_name, 'img/user/' . $username . '_' . $unik . '-' . $date . '.' . end($tmp));
            //var_dump($tes); die;
            return ($username . '_' . $unik . '-' . $date . '.' . end($tmp));
        }

        //upload gambar dulu
        $img = upload();
        if (!$img) {
            return false;
        }

        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $alamat = $_POST['alamat'];
        $pass = $_POST['pass'];
        $level = "admin";

        $this->db->query('SELECT username FROM user_login WHERE username=:username');
        $this->db->bind('username', $username);
        $this->db->execute();
        $cek1 = $this->db->rowCount();
        if ($cek1 > 0) {
            header('Location: ' . BASEURL . '/user');
        } else {
            try {
                $this->db->query('INSERT INTO ' . $this->table . ' VALUES ( :id, :username, :email, :name, :password, :level,  :alamat, :image, :qrcode)');

                $this->db->bind('id', $id);
                $this->db->bind('username', $username);
                $this->db->bind('email', $email);
                $this->db->bind('name', $name);
                $this->db->bind('password', $pass);
                $this->db->bind('level', $level);
                $this->db->bind('alamat', $alamat);
                $this->db->bind('image', $img);
                $this->db->bind('qrcode', '');

                $this->db->execute();

                return $this->db->rowCount();
            } catch (PDOException $e) {
                header('Location: ' . BASEURL . '/user/member');
            }
        }
    }

    //cek userneame
    public function auth()
    {
        $username = $_POST['username'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $alamat = $_POST['alamat'];
        $pass = $_POST['pass'];
        $level = "member";

        $this->db->query("SELECT username FROM user_login WHERE username=:username");


        $this->db->bind('username', $username);


        $this->db->execute();

        return $this->db->single();

        return $this->db->rowCount();
    }


    public function card()
    {
        $id = $_POST['id-print'];
        $query = "SELECT * FROM user_login WHERE id=:id";
        $this->db->query($query);

        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->single();
    }
}
