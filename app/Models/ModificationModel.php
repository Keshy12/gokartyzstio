<?php namespace App\Models;


use CodeIgniter\Database\ConnectionInterface;


class ModificationModel{

    protected $db;

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    function getcompetitor()
    {
        $resultcompetitor = $this->db->table('tm_zawodnik');
        return $resultcompetitor->get()->getResult();
    }

    function getschool()
    {
        $resultcompetitor = $this->db->table('szkola');            
        return $resultcompetitor->get()->getResult();
    }

    function getgokart()
    {
        $resultcompetitor = $this->db->table('gokart');             
        return $resultcompetitor->get()->getResult();
    }

    function getcity()
    {
        $resultcompetitor = $this->db->table('miasto');             
        return $resultcompetitor->get()->getResult();
    }

    function getstatus()
    {
        $resultcompetitor = $this->db->table('status_przejazdu');           
        return $resultcompetitor->get()->getResult();
    }

    function getchosencompetitor($id)
    {
        
        $resultchosen = $this->db->table('tm_zawodnik')
        ->where('tm_zawodnik_id', $id);
        return $resultchosen->get()->getResult();
    }

    function getchosenschool($id)
    {
        
        $resultcompetitor = $this->db->table('szkola')
        ->where('szkola_id', $id);         
        return $resultcompetitor->get()->getResult();
    }

    function getchosengokart($id)
    {
        
        $resultcompetitor = $this->db->table('gokart')
        ->where('gokart_id', $id);         
        return $resultcompetitor->get()->getResult();
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