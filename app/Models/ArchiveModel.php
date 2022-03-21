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
        ->where('status_zawodow_id !=', 1)
        ->orderBy('status_zawodow_id', 'ASC')
        ->orderBy('data_rozpoczecia', 'DESC');
        return $result->get()->getResult();
    }

    function showSelectedCompetition($id){
        $result = $this->db->table('zawody')
        ->join('archiwum', 'zawody_id')
        ->join('szkola', 'szkola_id')
        ->join('gokart', 'gokart_id')
        ->where('zawody_id', $id)
        ->orderBy('(CASE WHEN czas IS NULL Then "Dyskwalfikacja" else 0 end), czas ASC')
        ->get()->getResult();
        return $result;
    }

}