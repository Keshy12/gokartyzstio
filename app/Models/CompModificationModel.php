<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CompModificationModel extends AppendModel{

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    public function changeState($id, $newState)
    {
        $this->db->query('UPDATE zawody SET status_zawodow_id = '.$newState.' WHERE zawody_id = '.$id);
    }

    public function getWithJoin($table, $joinTable, $value)
    {
        $result = $this->db->table($table)
        ->join($joinTable, $value);
        return $result->get()->getResult();
    }

    public function remove($table, $id)
    {
        $result = $this->db->table($table)
        ->where($table.'_id', $id)
        ->delete();
    }
}