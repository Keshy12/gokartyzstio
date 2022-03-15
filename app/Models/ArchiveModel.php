<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class ArchiveModel{

    protected $db;

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }


    function showAllCompetitions(){        
        $result = $this->db->table('zawody')       
        ->join('status_zawodow','status_zawodow_id')
        ->orderBy('data_zakonczenia', 'DESC');
        return $result->get()->getResult();
    }

}