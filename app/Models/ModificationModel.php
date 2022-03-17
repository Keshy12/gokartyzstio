<?php namespace App\Models;


use CodeIgniter\Database\ConnectionInterface;


class ModificationModel{

    protected $db;

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    function get($subject)
    {
        $resultcompetitor = $this->db->table($subject);
        return $resultcompetitor->get()->getResult();
    }

    function getchosen($id,$subject)
    {
        
        $resultchosen = $this->db->table($subject)
        ->where($subject.'_id', $id);
        return $resultchosen->get()->getResult();
    }

    
    function getride()
    {
        $resultride = $this->db->table('tm_przejazd')
        ->join('tm_zawodnik','tm_zawodnik_id')
        ->join('status_przejazdu','status_przejazdu_id')
        ->join('gokart','gokart_id');
        return $resultride->get()->getResult();
    }

    function getchosenride($id)
    {
        
        $resultride = $this->db->table('tm_przejazd')
        ->join('tm_zawodnik','tm_zawodnik_id')
        ->join('status_przejazdu','status_przejazdu_id')
        ->join('gokart','gokart_id')
        ->where('tm_przejazd_id', $id);
        return $resultride->get()->getResult();
    }
}