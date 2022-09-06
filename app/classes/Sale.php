<?php 

namespace App;

require '../vendor/autoload.php';

use App\Connection as Connection;

class Sale {

    private $db;

    public function __construct()
    {
        $this->db = Connection::get()->connect();
    }

    public function Insert ($payload) {
        $sql = "INSERT INTO sale (". implode(",",array_keys($payload)).") values (". implode(',', array_fill(0, count($payload), '?')).")";
        $st = $this->db->prepare($sql);
        $this->db->beginTransaction();
        $st->execute($payload);
        $this->db->commit();
        return $this->db->lastInsertId();
    }

    public function Update($payload)
    {
        $sql = "UPDATE sale SET profile_id = ?, name = ?, login = ? password = ? where saleProduct_id = ? ";
        $st = $this->db->prepare($sql);
        $st->execute($payload);
        return true;
    }

    public function SelectAll () {
        $sql = "SELECT * FROM sale ";
        $st = $this->db->prepare($sql);
        $st->execute();
        while ($dadosRetorn = $st->fetch(\PDO::FETCH_OBJ)) {
            $return[] = $dadosRetorn; 
        }

        return $return;
    }

    public function GetProductById ($payload)
    {
        $sql = "SELECT * FROM sale where saleProduct_id = ?";
        $st = $this->db->prepare($sql);
        $st->execute($payload);
        while ($dadosRetorn = $st->fetch(\PDO::FETCH_OBJ)) {
            $return[] = $dadosRetorn;
        }

        return $return;
    }
}