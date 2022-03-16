<?php namespace App\Models;


use CodeIgniter\Database\ConnectionInterface;


class LoginModel{

    protected $db;

    public function __construct(ConnectionInterface &$db){
        $this->db =& $db;
    }
    
    function getLogin(){
        $builder = $this->db->table('uzytkownik');
        return $builder->get()->getResult();
    }
}