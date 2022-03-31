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

    function comp_before()   // przejechany()
    {
        $result = $this->db->table('tm_przejazd')
            ->where('status_przejazdu_id', 1)
            ->orderBy('tm_przejazd_id', 'DESC');
        $result = $this->join($result);
        return $result->get(1)->getResult();
    }

    function comp_after()        // pojedzie()
    {
        $result = $this->db->table('tm_przejazd')
            ->where('status_przejazdu_id', 3)
            ->orderBy('tm_przejazd_id', 'ASC');
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
        ->orderBy('(CASE WHEN czas IS NULL Then "Dyskwalfikacja" else 0 end), czas ASC')
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

    function schoolAVG()
    {
        $resultschoolAVG=$this->db
        ->query('SELECT szkola.nazwa, szkola.akronim, round(AVG(czas)) as czas FROM `tm_przejazd` JOIN tm_zawodnik USING (tm_zawodnik_id) join szkola using (szkola_id) GROUP BY szkola.nazwa ORDER by czas ASC');
        return $resultschoolAVG->getResult();

        // $resultleaderboard=$this->db->query("SELECT szkola.nazwa, round(AVG(czas)) as time FROM `tm_przejazd` JOIN tm_zawodnik USING (tm_zawodnik_id) join szkola using (szkola_id) GROUP BY szkola.nazwa ORDER by time ASC ")
        // ->getResult();
        // return $resultleaderboard;
    }

}