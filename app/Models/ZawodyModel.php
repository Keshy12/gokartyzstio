<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class ZawodyModel{

    protected $db;

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    function all(){
        
        $result = $this->db->table('tm_przejazd');
        return $result->get()->getResult();

    }

    function comp_now()
    {
        $result = $this->db->table('tm_przejazd')
            ->where('status_przejazdu_id', 2);
        $result = $this->join($result);
        
        return $result->get()->getResult();
    }

    function comp_before($id)
    {
        $result = $this->db->table('tm_przejazd')
            ->where('status_przejazdu_id', 1);
        if($id > 2) 
            $result->where('tm_przejazd_id >=', $id-1);
        $result = $this->join($result);
        return $result->get(1)->getResult();
    }

    function comp_after()
    {
        $result = $this->db->table('tm_przejazd')
            ->where('status_przejazdu_id', 3);
        $result = $this->join($result);
        return $result->get(3)->getResult();
    }  

    function join($result)
    {
        $result->join('tm_zawodnik', 'tm_zawodnik_id')
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
        ->where('status_przejazdu_id',1)
        ->get(8)
        ->getResult();
        return $resultleaderboard;
    }

    public function formatMilliseconds($milliseconds) {
        $seconds = floor($milliseconds / 1000);
        $minutes = floor($seconds / 60);
        $milliseconds = $milliseconds % 1000;
        $seconds = $seconds % 60;
        $minutes = $minutes % 60;
    
        $format = '%02u:%02u.%03u';
        $time = sprintf($format, $minutes, $seconds, $milliseconds);
        return $time;
    }

}