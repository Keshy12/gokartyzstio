<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CompetitionModel{

    protected $db;

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    function comp_now()  // jedzie()
    {
        $result = $this->db->table('tm_przejazd')
            ->where('status_przejazdu_id', 2);
        $result = $this->join($result);
        
        return $result->get()->getResult();
    }

    function comp_before($id)   // przejechany()
    {
        $result = $this->db->table('tm_przejazd')
            ->where('status_przejazdu_id', 1);
        if($id > 2) 
            $result->where('tm_przejazd_id >=', $id-1);
        $result = $this->join($result);
        return $result->get(1)->getResult();
    }

    function comp_after()        // pojedzie()
    {
        $result = $this->db->table('tm_przejazd')
            ->where('status_przejazdu_id', 3);
        $result = $this->join($result);
        return $result->get(3)->getResult();
    }  

    function join($result)
    {
        $result->join('tm_zawodnik', 'tm_zawodnik_id')
            ->join('szkola', 'szkola_id')
            ->join('gokart', 'gokart_id');
        return $result;
    }

    function leaderboard($limit)
    {
        $resultleaderboard=$this->db->table('tm_zawodnik')
        ->join('tm_przejazd', 'tm_zawodnik_id')
        ->join('szkola', 'szkola_id')
        ->join('status_przejazdu','status_przejazdu_id')
        ->join('gokart','gokart_id')
        ->orderBy('czas', 'ASC')
        ->where('status_przejazdu_id',1);
        switch($limit)
        {
            case -1:
                return $resultleaderboard->get()->getResult();
                break;
            default :
                return $resultleaderboard->get($limit)->getResult();
                break;
        }
    }

    function leaderboardfull()
    {
        $resultleaderboardfull=$this->db->table('tm_zawodnik')
        ->join('tm_przejazd', 'tm_zawodnik_id')
        ->join('szkola', 'szkola_id')
        ->join('status_przejazdu','status_przejazdu_id')
        ->join('gokart','gokart_id')
        ->orderBy('czas', 'ASC')
        ->where('status_przejazdu_id',1)
        ->get()
        ->getResult();
        return $resultleaderboardfull;
    }

    function schoolAVG()
    {
        $resultschoolAVG=$this->db->table('tm_przejazd')
        ->select('szkola.nazwa', ' round(AVG(czas) as time')
        ->join('tm_zawodnik', 'tm_zawodnik_id')
        ->join('szkola', 'szkola_id')
        ->groupBy('nazwa')
        ->orderBy('time','ASC')
        ->get()
        ->getResult();
        return $resultschoolAVG;

        // $resultleaderboard=$this->db->query("SELECT szkola.nazwa, round(AVG(czas)) as time FROM `tm_przejazd` JOIN tm_zawodnik USING (tm_zawodnik_id) join szkola using (szkola_id) GROUP BY szkola.nazwa ORDER by time ASC ")
        // ->getResult();
        // return $resultleaderboard;
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