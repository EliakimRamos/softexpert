<?php

namespace App;

require '../vendor/autoload.php';



use App\Connection as Connection;

class Product {

    private $db;

    public function __construct()
    {
        $this->db = Connection::get()->connect();
    }

    public function Login ($payload) {
        $sql = "select * from product where login = ? and password = ? ";
        $st = $this->db->prepare($sql);
        $st->execute($payload);
        $result = $st->fetch(\PDO::FETCH_OBJ);
        return $result;
    }

    public function Insert ($payload) {
        $sql = "INSERT INTO product (". implode(",",array_keys($payload)).") values (". implode(',', array_fill(0, count($payload), '?')).")";
        $st = $this->db->prepare($sql);
        $this->db->beginTransaction();
        $st->execute($payload);
        $this->db->commit();
        return $this->db->lastInsertId();
    }

    public function Update($payload)
    {
        $sql = "UPDATE product SET profile_id = ?, name = ?, login = ? password = ? where product_id = ? ";
        $st = $this->db->prepare($sql);
        $st->execute($payload);
        return true;
    }

    public function SelectAll () {
        $sql = "SELECT * FROM product ";
        $st = $this->db->prepare($sql);
        $st->execute();
        while ($dadosRetorn = $st->fetch(\PDO::FETCH_OBJ)) {
            $return[] = $dadosRetorn; 
        }

        return $return;
    }

    public function GetProductById ($payload)
    {
        $sql = "SELECT * FROM product where product_id = ?";
        $st = $this->db->prepare($sql);
        $st->execute($payload);
        while ($dadosRetorn = $st->fetch(\PDO::FETCH_OBJ)) {
            $return[] = $dadosRetorn;
        }

        return $return;
    }
}