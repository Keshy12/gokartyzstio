<?php namespace App\Models;


use CodeIgniter\Database\ConnectionInterface;

class AppendModel extends ModificationModel{

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    function add($name, $values)
    {
        $result = $this->db->table($name)
        ->insert($values);
    }
}