<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CompModificationModel extends AppendModel{

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    public function begin()
    {
        $this->db->query('UPDATE tm_przejazd SET status_przejazdu_id = 1, czas = null WHERE status_przejazdu_id = 2');
        $this->db->query('UPDATE tm_przejazd SET status_przejazdu_id = 2 WHERE status_przejazdu_id = 3 LIMIT 1');
    }
}