<?php 

namespace App;

require '../vendor/autoload.php';

use App\Connection as Connection;

class Profile {

    private $db;

    public function __construct()
    {
        $this->db = Connection::get()->connect();
    }

    public function Insert ($payload) {
        $sql = "INSERT INTO profile (". implode(",",array_keys($payload)).") values (". implode(',', array_fill(0, count($payload), '?')).")";
        $st = $this->db->prepare($sql);
        $this->db->beginTransaction();
        $st->execute(array($payload['name']));
        $this->db->commit();
        return $this->db->lastInsertId();
    }

    public function Update($payload)
    {
        $sql = "UPDATE profile SET name = ? where profile_id = ? ";
        $st = $this->db->prepare($sql);
        $st->execute(array($payload['name'], $payload['profile_id']));
        return true;
    }

    public function SelectAll () {
        $sql = "SELECT * FROM profile ";
        $st = $this->db->prepare($sql);
        $st->execute();
        while ($dadosRetorn = $st->fetch(\PDO::FETCH_OBJ)) {
            $return[] = $dadosRetorn; 
        }

        return $return;
    }

    public function GetProfileById ($payload)
    {
        $sql = "SELECT * FROM profile where profile_id = ?";
        $st = $this->db->prepare($sql);
        $st->execute(array($payload['id']));
        while ($dadosRetorn = $st->fetch(\PDO::FETCH_OBJ)) {
            $return[] = $dadosRetorn;
        }

        return $return;
    }
}