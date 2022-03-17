<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CompModificationModel extends AppendModel{

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    public function begin($id)
    {
        $this->db->query('UPDATE zawody SET status_zawodow_id = 2 WHERE zawody_id = '.$id);
    }
}