<?php 

namespace App;

require '../vendor/autoload.php';

use App\Connection as Connection;

class ProductType {

    private $db;

    public function __construct()
    {
        $this->db = Connection::get()->connect();
    }

    public function Login ($payload) {
        $sql = "select * from productType where login = ? and password = ? ";
        $st = $this->db->prepare($sql);
        $st->execute($payload);
        $result = $st->fetch(\PDO::FETCH_OBJ);
        return $result;
    }

    public function Insert ($payload) {
        $sql = "INSERT INTO productType (". implode(",",array_keys($payload)).") values (". implode(',', array_fill(0, count($payload), '?')).")";
        $st = $this->db->prepare($sql);
        $this->db->beginTransaction();
        $st->execute($payload);
        $this->db->commit();
        return $this->db->lastInsertId();
    }

    public function Update($payload)
    {
        $sql = "UPDATE productType SET profile_id = ?, name = ?, login = ? password = ? where productType_id = ? ";
        $st = $this->db->prepare($sql);
        $st->execute($payload);
        return true;
    }

    public function SelectAll () {
        $sql = "SELECT * FROM productType ";
        $st = $this->db->prepare($sql);
        $st->execute();
        while ($dadosRetorn = $st->fetch(\PDO::FETCH_OBJ)) {
            $return[] = $dadosRetorn; 
        }

        return $return;
    }

    public function GetProductTypeById ($payload)
    {
        $sql = "SELECT * FROM productType where productType_id = ?";
        $st = $this->db->prepare($sql);
        $st->execute($payload);
        while ($dadosRetorn = $st->fetch(\PDO::FETCH_OBJ)) {
            $return[] = $dadosRetorn;
        }

        return $return;
    }
}