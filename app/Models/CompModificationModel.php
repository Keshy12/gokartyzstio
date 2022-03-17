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
}