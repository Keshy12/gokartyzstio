<?php namespace App\Models;


use CodeIgniter\Database\ConnectionInterface;

class ArbiterModel extends CompetitionModel{

    function disqualify()
    {
        $this->db->query('UPDATE tm_przejazd SET status_przejazdu_id = 1, czas = null WHERE status_przejazdu_id = 2');
        $this->db->query('UPDATE tm_przejazd SET status_przejazdu_id = 2 WHERE status_przejazdu_id = 3 LIMIT 1');
    }

    function setTime($time)
    { 
        $this->db->query("UPDATE tm_przejazd SET status_przejazdu_id = 1, czas = ".$time." WHERE status_przejazdu_id = 2");
        $this->db->query('UPDATE tm_przejazd SET status_przejazdu_id = 2 WHERE status_przejazdu_id = 3 LIMIT 1');
    }

    function convertTimeToInt($min, $sec, $ms)
    {
        $result = $min * 60 * 1000;
        $result += $sec * 1000;
        $result += $ms;
        return $result;
    }

    function getStatus()
    {
        $builder = $this->db->table('zawody');
        return $builder->get()->getResult();
    }
}