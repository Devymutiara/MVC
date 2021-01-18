<?php

class Santri_model {

    private $table = 'santri',
            $db;
    
    public function __construct(){
        $this->db = new Database;
    }
    
    public function getAllSantri() {

        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }

    public function getSantriById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahSantri($data) {

        $query = "INSERT INTO santri(nama, divisi, status) VALUES(:nama, :divisi, :status)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('divisi', $data['divisi']);
        $this->db->bind('status', $data['status']);

        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function hapusSantri($id) {

        $query = "DELETE FROM santri WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function editSantri($data) {

        $query = "UPDATE santri SET nama = :nama, divisi = :divisi, status = :status WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('divisi', $data['divisi']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        
        return $this->db->rowCount();
    }
}