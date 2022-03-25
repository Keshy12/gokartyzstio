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

    function checkStatus($table, $id, ...$joins)
    {
        $result = $this->db->table($table)
        ->select($table.'_id');
        foreach($joins as $join)
            $result->join($join[0], $join[1]);
        $result->where($table.'_id', $id)
        ->where('status_zawodow_id', 1);
        return $result->get(1)->getResult();
    }

    function getfirstid($table, ...$wheres)
    {
        $result = $this->db->table($table)
        ->select($table.'_id');
        foreach($wheres as $where)
            $result->where($where[0], $where[1]);
        $result->orderBy($table.'_id', 'ASC');
        return $result->get(1)->getResult();
    }

    function getchosen($table, $column, $value)
    {
        $resultchosen = $this->db->table($table)
        ->where($column, $value);
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

    function countRows($table, $column, $value)
    {
        $result = $this->db->table($table)
        ->selectCount($table.'_id', 'count')
        ->where($column, $value);
        return $result->get()->getResult();
    }

    public function remove($table, $column, $value, ...$joins)
    {
        $result = $this->db->table($table);
        foreach($joins as $join)
            $result->join([$join[0], $join[1]]);
        $result->where($column, $value)
        ->delete();
    }

    function modifycompetitor($to_modify_id,$name,$surname,$bdate,$schol_id,$competition_id)
    {
        $this->db->query("UPDATE tm_zawodnik SET imie = '".$name."', nazwisko = '".$surname."', data_urodzenia = '".$bdate."', szkola_id = '".$schol_id."', zawody_id = '".$competition_id."' WHERE tm_zawodnik_id = '".$to_modify_id."'");
    }

    function modifyride($to_modify_id,$gokart_id,$time)
    {
        $this->db->query("UPDATE tm_przejazd SET gokart_id = '".$gokart_id."', czas = '".$time."' WHERE tm_przejazd_id = ".$to_modify_id);
    }

    function modifyschool($to_modify_id,$name,$city_id,$acronym)
    {
        $this->db->query("UPDATE szkola SET nazwa = '".$name."', miasto_id = '".$city_id."', akronim = '$acronym' WHERE nazwa = '".$to_modify_id."'");
    }

    function modifygokart($to_modify_id,$name)
    {
        $this->db->query("UPDATE gokart SET nazwa = '".$name."' WHERE nazwa = '".$to_modify_id."'");
    }

    function modifycompetition($to_modify_id,$name,$start_date,$end_date)
    {
        $this->db->query("UPDATE zawody SET nazwa = '".$name."', data_rozpoczecia = '".$start_date."', data_zakonczenia = '".$end_date."' WHERE zawody_id = ".$to_modify_id);
    }

    function modifycity($to_modify_id,$name)
    {
        $this->db->query("UPDATE miasto SET nazwa = '".$name."' WHERE miasto_id = '".$to_modify_id."'");
    }
}