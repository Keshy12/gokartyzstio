<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CompModificationModel extends AppendModel{

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    public function changeState($id, $newState)
    {
        $this->db->query('UPDATE zawody SET status_zawodow_id = '.$newState.' WHERE zawody_id = '.$id);
    }

    public function getWithJoin($table, ...$joins)
    {
        $result = $this->db->table($table);
        foreach($joins as $join)
            $result->join($join[0], $join[1]);
        return $result->get()->getResult();
    }

    public function getId()
    {
        $result = $this->db->table('tm_zawodnik')
        ->select('tm_zawodnik_id')
        ->join('zawody', 'zawody_id')
        ->where('status_zawodow_id', 2);
        return $result->get()->getResult();
    }

    function updateRide($id)
    {
        $this->db->query("UPDATE tm_przejazd SET status_przejazdu_id = 2 WHERE tm_przejazd_id = ".$id);
    }

    function updateDate($id)
    {
        $this->db->query("UPDATE zawody SET data_zakonczenia = NOW() WHERE zawody_id = ".$id);
    }

    function ridesOrder($osoby, $liczbaosobnaprzejazd, $liczbagokart)
    {
        $liczbaosob = count($osoby);
        shuffle($osoby);

        $liczbaprzejazdow = ($liczbaosob % $liczbaosobnaprzejazd == 0) ? (int)($liczbaosob / $liczbaosobnaprzejazd) : (int)($liczbaosob / $liczbaosobnaprzejazd) + 1;

        $zawody = array();
        $osobyI = 0;

        $checkArray = array();
        for($i=0; $i < $liczbagokart; $i++)
            $checkArray[$i] = array();

        for($zawodyI = 0; $zawodyI  < $liczbaprzejazdow-1; $zawodyI++)
        {
            $zawody[$zawodyI] = array();

            for($przejazdI = 0; $przejazdI < $liczbagokart; $przejazdI++)
            {
                $zawody[$zawodyI][$przejazdI] = array();

                for($gokartI = 0; $gokartI < $liczbaosobnaprzejazd; $gokartI++)
                {
                    if($osobyI == count($osoby))
                        $osobyI = 0;
                    if(in_array($osoby[$osobyI], $checkArray[$przejazdI]))
                    {
                        $gokartI--;
                        $osobyI++;
                        continue;
                    }
                    $checkArray[$przejazdI][$gokartI + ($zawodyI * $liczbaosobnaprzejazd)] = $osoby[$osobyI];
                    $zawody[$zawodyI][$przejazdI][$gokartI] = $osoby[$osobyI];
                    $osobyI++;
                }
            }
        }

        $przejazdLength = (isset($zawody[0])) ? count($zawody[0]) : 1;
        $zawodyLength = count($zawody);
        $zawody[count($zawody)] = array();  

        $liczbaosobwostatnim = ($liczbaosob % $liczbaosobnaprzejazd == 0) ? $liczbaosobnaprzejazd : $liczbaosob % $liczbaosobnaprzejazd;

        for($przejazdI2 = 0; $przejazdI2 < $liczbagokart; $przejazdI2++)
        {
            for($gokartI2 = 0; $gokartI2 < $liczbaosobwostatnim; $gokartI2++)
            {
                if($osobyI == count($osoby))
                    $osobyI = 0;
                if(in_array($osoby[$osobyI], $checkArray[$przejazdI2]))
                {
                    $gokartI2--;
                    $osobyI++;
                    continue;
                }
                $zawody[$zawodyLength][$przejazdI2][$gokartI2] = $osoby[$osobyI];
                $osobyI++;
            }
        }
        return $zawody;
    }
}