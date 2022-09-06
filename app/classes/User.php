<?php 

namespace App;

require '../vendor/autoload.php';

use App\Connection as Connection;

class User {

    private $db;

    public function __construct()
    {
        $this->db = Connection::get()->connect();
    }

    public function Login ($payload) {
        $sql = 'select * from public."public."user"" as u where u.login = ? and u.password = ? ';
        $st = $this->db->prepare($sql);
        $st->execute(array($payload['login'],$payload['password']));
        $result = $st->fetch(\PDO::FETCH_OBJ);
        return $result;
    }

    public function Insert ($payload) {
        $sql = 'INSERT INTO public."user" ('. implode(",",array_keys($payload)).') values ('. implode(',', array_fill(0, count($payload), '?')).')';
        $st = $this->db->prepare($sql);
        $this->db->beginTransaction();
        $st->execute($payload);
        $this->db->commit();
        return $this->db->lastInsertId();
    }

    public function Update($payload)
    {
        $sql = 'UPDATE public."user" SET profile_id = ?, name = ?, login = ? password = ? where user_id = ? ';
        $st = $this->db->prepare($sql);
        $st->execute($payload);
        return true;
    }

    public function SelectAll () {
        $sql = 'SELECT * FROM public."user" ';
        $st = $this->db->prepare($sql);
        $st->execute();
        while ($dadosRetorn = $st->fetch(\PDO::FETCH_OBJ)) {
            $return[] = $dadosRetorn; 
        }

        return $return;
    }

    public function GetUserById ($payload)
    {
        $sql = 'SELECT * FROM public."user" where user_id = ?';
        $st = $this->db->prepare($sql);
        $st->execute(array($payload['id']));
        while ($dadosRetorn = $st->fetch(\PDO::FETCH_OBJ)) {
            $return[] = $dadosRetorn;
        }

        return $return;
    }
}