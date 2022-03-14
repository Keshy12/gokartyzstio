<?php namespace App\Models;


use CodeIgniter\Database\ConnectionInterface;


class CustomModel{

    protected $db;

    public function __construct(ConnectionInterface &$db){
        $this->db =& $db;
    }

    function getLogin(){
        $builder = $this->db->table('uzytkownik');
        $builder->select('login');
        return $builder;
    }

    function getPass($nazwa){
        $builder = $this->db->table('uzytkownik');
        $builder->select('haslo');
        $builder->where('login', $nazwa);
        return $builder->get()->getResult();
    }

}