<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class GokartModel{

    protected $db;

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    function all(){
        
        $result = $this->db->table('tm_przejazd');
        return $result->get()->getResult();

    }

    function jedzie()
    {
        $result = $this->db->table('tm_przejazd')
            ->where('status_zawodnika_id', 2);
        $result = $this->join($result);
        
        return $result->get()->getResult();
    }

    function przejechany($id)
    {
        $result = $this->db->table('tm_przejazd')
            ->where('status_zawodnika_id', 1);
        if($id > 2) 
            $result->where('tm_przejazd_id >=', $id-1);
        $result = $this->join($result);
        $result->join('czas', 'przejazd_id');
        return $result->get(1)->getResult();
    }

    function nieprzejechany()
    {
        $result = $this->db->table('tm_przejazd')
            ->where('status_zawodnika_id', 3);
        $result = $this->join($result);
        return $result->get(3)->getResult();
    }  

    function join($result)
    {
        $result->join('przejazd', 'przejazd_id')
            ->join('zawodnik', 'zawodnik_id')
            ->join('szkola', 'szkola_id');
        return $result;
    }

    function leaderboard()
    {
        $resultleaderboard=$this->db->table('tm_zawodnik')
        ->join('tm_przejazd', 'tm_zawodnik_id')
        ->join('szkola', 'szkola_id')
        ->join('status_przejazdu','status_przejazdu_id')
        ->join('gokart','gokart_id')
        ->orderBy('czas', 'ASC')
        ->where('status_zawodnika_id',1)
        ->get(8)
        ->getResult();
        return $resultleaderboard;
    }

}