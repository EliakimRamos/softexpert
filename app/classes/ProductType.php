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

    public function Insert ($payload) {
        $sql = "INSERT INTO product_type (". implode(",",array_keys($payload)).") values (". implode(',', array_fill(0, count($payload), '?')).")";
        $st = $this->db->prepare($sql);
        $this->db->beginTransaction();
        $st->execute(array($payload['name']));
        $this->db->commit();
        return $this->db->lastInsertId();
    }

    public function Update($payload)
    {
        $sql = "UPDATE product_type SET name = ? where product_type_id = ? ";
        $st = $this->db->prepare($sql);
        $st->execute(array($payload['name'],$payload['id']));
        return true;
    }

    public function SelectAll () {
        $sql = "SELECT * FROM product_type ";
        $st = $this->db->prepare($sql);
        $st->execute();
        while ($dadosRetorn = $st->fetch(\PDO::FETCH_OBJ)) {
            $return[] = $dadosRetorn; 
        }

        return $return;
    }

    public function GetProductTypeById ($payload)
    {
        $sql = "SELECT * FROM product_type where product_type_id = ?";
        $st = $this->db->prepare($sql);
        $st->execute(array($payload['id']));
        while ($dadosRetorn = $st->fetch(\PDO::FETCH_OBJ)) {
            $return[] = $dadosRetorn;
        }

        return $return;
    }
}