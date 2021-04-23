<?php


class H_model extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRandom()
    {
        $query = "SELECT * FROM produk ORDER BY RAND() LIMIT 4";

        $this->db->query($query);

        $this->db->execute();
        
        return $this->db->resultSet();
    }

    public function get()
    {
        $query = "SELECT * FROM produk ORDER BY RAND() LIMIT 4";

        $this->db->query($query);

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

        // var_dump($); die;
        // if (!isset($category)) {
        //     $query = "SELECT * FROM produk ORDER BY RAND() LIMIT 4";

        //     $this->db->query($query);

        //     $this->db->execute();
        //     return $this->db->resultSet();
        // } else {
            
        // }
    }

    public function getCategory2()
    {
        $cat = $_SESSION['category'];

        
        if ($cat =='') {
            $query = "SELECT * FROM produk";
            $this->db->query($query);

            $this->db->execute();
            return $this->db->resultSet();
        } elseif ($cat == 'all') {
            $query = "SELECT * FROM produk";
            $this->db->query($query);

            $this->db->execute();
            return $this->db->resultSet();
        } else {
            $query = "SELECT * FROM produk WHERE category=:cat";

            $this->db->query($query);
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

        

        
        if ($search =='') {
            $query = "SELECT * FROM produk";
            $this->db->query($query);

            $this->db->execute();
            return $this->db->resultSet();
        } else {
            $query = "SELECT * FROM produk WHERE name LIKE :search OR code LIKE :search OR category LIKE :search";

            $this->db->query($query);
            $this->db->bind('search', "%$search%");

            $this->db->execute();
            return $this->db->resultSet();
        }
    }
}