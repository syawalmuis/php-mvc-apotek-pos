<?php


class Like_model extends Controller{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getUser(){
        
        $query = "SELECT * FROM like_product WHERE username=:usr";
        $this->db->query($query);
        $this->db->bind('usr',$_SESSION['username']);

        $this->db->execute();
        return $this->db->resultSet();
    }

    public function get()
    {
        $usr = $_SESSION['username'];
        // SELECT produk.*, like_product.value as sum FROM produk,like_product WHERE produk.code = like_product.code AND like_product.username ="shwwl" ORDER BY RAND() LIMIT 4
        // $query = "SELECT * FROM produk ORDER BY RAND() LIMIT 4";
        $query = "SELECT produk.*, like_product.value as like_value FROM produk,like_product WHERE produk.code = like_product.code AND like_product.username=:usr ORDER BY RAND() LIMIT 4";

        $this->db->query($query);
        $this->db->bind('usr',$usr);

        $this->db->execute();
        return $this->db->resultSet();
    }

    public function sesi()
    {
        $_SESSION['cat'] = $_POST['category'];
    }

    public function getCategory()
    {
        $_SESSION['category'] = $_POST['category'];

       
    }

    public function getCategory2()
    {
        $cat = $_SESSION['category'];
         $usr = $_SESSION['username'];
        
        if ($cat =='') {
            $query = "SELECT produk.*, like_product.value as like_value FROM produk,like_product WHERE produk.code = like_product.code AND like_product.username=:usr";
            $this->db->query($query);
            $this->db->bind('usr', $usr);

            $this->db->execute();
            return $this->db->resultSet();
        } elseif ($cat == 'all') {
            $query = "SELECT produk.*, like_product.value as like_value FROM produk,like_product WHERE produk.code = like_product.code AND like_product.username=:usr";
            $this->db->query($query);
            $this->db->bind('usr', $usr);

            $this->db->execute();
            return $this->db->resultSet();
        } else {
            $query = "SELECT produk.*, like_product.value as like_value FROM produk,like_product WHERE produk.code = like_product.code AND like_product.username=:usr AND category=:cat";

            $this->db->query($query);
            $this->db->bind('usr', $usr);
            $this->db->bind('cat', $cat);

            $this->db->execute();

            return $this->db->resultSet();
        }
    }

    public function searchsesi()
    {
        $_SESSION['search'] = $_POST['search-usr'];
    }

    public function searchpost()
    {
        $search = $_SESSION['search'];
        $usr = $_SESSION['username'];
        

        
        if ($search =='') {
            $query = "SELECT produk.*, like_product.value as like_value FROM produk,like_product WHERE produk.code = like_product.code AND like_product.username=:usr";
            $this->db->query($query);
            $this->db->bind('usr', $usr);

            $this->db->execute();
            return $this->db->resultSet();
        } else {
            // $query = "SELECT * FROM produk WHERE name LIKE :search OR code LIKE :search OR category LIKE :search";
            $query = "SELECT produk.*, like_product.value as like_value FROM produk,like_product WHERE produk.code = like_product.code AND like_product.username=:usr AND (produk.name LIKE :search OR produk.code LIKE :search OR produk.category LIKE :search)";

            $this->db->query($query);
            $this->db->bind('search', "%$search%");
            $this->db->bind('usr', $usr);

            $this->db->execute();
            return $this->db->resultSet();
        }
    }

    // ++++++ TAMBAH ++++++//
    public function tambah($code){

        $usr = $_SESSION['username'];

        $query = "SELECT * FROM produk WHERE code=:code";
        $this->db->query($query);

        $this->db->bind('code', $code);
        $this->db->execute();
        $data = $this->db->single();

        $set = $this->db->rowCount();
        if($set > 0){
            
            $val = $data['value'] + 1;
            $this->db->query('UPDATE produk SET value=:val WHERE code=:code');

            $this->db->bind('val', $val);
            $this->db->bind('code', $code);
            $this->db->execute();

            $set = $this->db->rowCount();

            if ($set>0){
                
                $val = 1;
                $this->db->query('UPDATE like_product SET value=:val WHERE code=:code AND username=:usr');
                
                $this->db->bind('val', $val);
                $this->db->bind('code', $code);
                $this->db->bind('usr', $usr);
                $this->db->execute();

                return $this->db->rowCount();
            }
        }
    }
    // ++++++ END TAMBAH ++++++//


    // +++++ KURANG LIKE ++++++++//
    public function kurang($code){
        $usr = $_SESSION['username'];

        $query = "SELECT * FROM produk WHERE code=:code";
        $this->db->query($query);

        $this->db->bind('code', $code);
        $this->db->execute();
        $data = $this->db->single();

        $set = $this->db->rowCount();
        if($set > 0){
            
            $val = $data['value'] - 1;
            $this->db->query('UPDATE produk SET value=:val WHERE code=:code');

            $this->db->bind('val', $val);
            $this->db->bind('code', $code);
            $this->db->execute();

            $set = $this->db->rowCount();

            if ($set>0){
                
                $val = 0;
                $this->db->query('UPDATE like_product SET value=:val WHERE code=:code AND username=:usr');
                
                $this->db->bind('val', $val);
                $this->db->bind('code', $code);
                $this->db->bind('usr', $usr);
                $this->db->execute();

                return $this->db->rowCount();
            }
        }
    }
    // +++++ END KURANG LIKE ++++++++//

}