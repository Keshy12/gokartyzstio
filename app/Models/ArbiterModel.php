<?php namespace App\Models;


use CodeIgniter\Database\ConnectionInterface;

class ArbiterModel extends CompetitionModel{

    function disqualify()
    {
        $this->db->query('UPDATE tm_przejazd SET status_przejazdu_id = 1, czas = null WHERE status_przejazdu_id = 2');
        $this->db->query('UPDATE tm_przejazd SET status_przejazdu_id = 2 WHERE status_przejazdu_id = 3 LIMIT 1');
    }

    function addTime($time)
    { 
        $this->db->query(`UPDATE tm_przejazd SET status_przejazdu_id = 1, czas = {$time} WHERE status_przejazdu_id = 2`);
        $this->db->query('UPDATE tm_przejazd SET status_przejazdu_id = 2 WHERE status_przejazdu_id = 3 LIMIT 1');
    }

    public function __construct(ConnectionInterface &$db){
        $this->db =& $db;
    }
    
    function getStatus(){
        $builder = $this->db->table('zawody');
        return $builder->get()->getResult();
    }
}
