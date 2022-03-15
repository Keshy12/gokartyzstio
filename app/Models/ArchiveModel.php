<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class ArchiwomModel{

    function all(){        
        $result = $this->db->table('tm_przejazd');
        return $result->get()->getResult();
    }

}