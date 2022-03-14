<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class GokartModel{

    protected $db;

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    function all(){
        
        $result = $this->db->table('tmp_przejazd');
        return $result->get()->getResult();

    }

    function jedzie()
    {
        $result = $this->db->table('tmp_przejazd')
            ->where('status_zawodnika_id', 2);
        $result = $this->join($result);
        
        return $result->get()->getResult();
    }

    function przejechany($id)
    {
        $result = $this->db->table('tmp_przejazd')
            ->where('status_zawodnika_id', 1);
        if($id > 2) 
            $result->where('tmp_przejazd_id >=', $id-1);
        $result = $this->join($result);
        $result->join('czas', 'przejazd_id');
        return $result->get(1)->getResult();
    }

    function nieprzejechany()
    {
        $result = $this->db->table('tmp_przejazd')
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
        $result=$this->db->table('zawodnik')
        ->join('przejazd', 'zawodnik_id')
        ->join('szkola', 'szkola_id')
        ->join('czas', 'przejazd_id')
        ->join('zawody','zawody_id')
        ->join('status_zawodow','status_zawodow_id')
        ->join('tmp_przejazd','przejazd_id')
        ->join('status_zawodnika','status_zawodnika_id')
        ->join('gokart','gokart_id')
        ->orderBy('czas', 'ASC')
        ->where('status_zawodow_id', 1)
        ->where('status_zawodnika_id',1)
        ->limit(8)
        ->get()
        ->getResult();
        return $result;
    }

}