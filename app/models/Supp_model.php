<?php

class Supp_model {
    
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getIdOto(){

        $this->db->query('SELECT max(id) AS idmax FROM supp_data');

        $this->db->execute();

        return $this->db->single();
    }

    public function getSuppData(){

        $this->db->query('SELECT * FROM supp_data');

        $this->db->execute();
        return $this->db->resultSet();
    }

    //add data
    public function add(){
        $id = $_POST['id-hidden'];
        $name = $_POST['name-supp'];
        $addr = $_POST['addr-supp'];
        $email = $_POST['email-supp'];

        $query = "INSERT INTO supp_data VALUES (:id, :supp_name, :supp_addr, :supp_contact)";
        $this->db->query($query);

        $this->db->bind('id',$id);
        $this->db->bind('supp_name', $name);
        $this->db->bind('supp_addr', $addr);
        $this->db->bind('supp_contact', $email);

        $this->db->execute();
        return $this->db->rowCount();
    }
    //end add data

    //delete data
    public function del($id){
        $this->db->query('DELETE FROM supp_data WHERE id=:id');

        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    //end delete data

    //edit detail
    public function editdetail($id){

        $this->db->query('SELECT * FROM supp_data WHERE id=:id');
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->single();
    }
    //end edit detail

    //edit save
    public function editsave(){
        $name = $_POST['modal-supp-data-name'];
        $addr = $_POST['modal-supp-data-addr'];
        $email = $_POST['modal-supp-data-email'];
        $id = $_POST['modal-supp-data-id'];

        $this->db->query('UPDATE supp_data SET supp_name=:supp_name, supp_addr=:supp_addr, supp_contact=:supp_contact WHERE id=:id');

        $this->db->bind('supp_name',$name);
        $this->db->bind('supp_addr',$addr);
        $this->db->bind('supp_contact',$email);
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();


    }
    //end edit save
}


?>