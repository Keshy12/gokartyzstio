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

    function getchosen($id,$subject)
    {
        
        $resultchosen = $this->db->table($subject)
        ->where($subject.'_id', $id);
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

    function modifycompetitor($to_modify_id,$name,$surname,$bdate,$schol_id)
    {
        $this->db->query("UPDATE `tm_zawodnik` SET `imie` = '$name', `nazwisko` = '$surname', `data_urodzenia` = '$bdate', `szkola_id` = '$schol_id' WHERE `tm_zawodnik`.`tm_zawodnik_id` = $to_modify_id ");
    }

    function modifyride($to_modify_id,$ride_status_id,$gokart_id,$time)
    {
        $this->db->query("UPDATE `tm_przejazd` SET `status_przejazdu_id` = '$ride_status_id', `gokart_id` = '$gokart_id', `czas` = '$time' WHERE `tm_przejazd`.`tm_przejazd_id` = $to_modify_id");
    }

    function modifyschool($to_modify_id,$name,$city_id,$acronym)
    {
        $this->db->query("UPDATE `szkola` SET `nazwa` = '$name', `miasto_id` = '$city_id', `akronim` = '$acronym' WHERE `szkola`.`szkola_id` = $to_modify_id");

    }

    function modifygokart($to_modify_id,$name)
    {
        $this->db->query("UPDATE `gokart` SET `nazwa` = '$name' WHERE `gokart`.`gokart_id` = $to_modify_id");

    }
}