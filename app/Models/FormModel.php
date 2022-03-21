<?php namespace App\Models;


use CodeIgniter\Database\ConnectionInterface;


class FormModel{

    protected $db;

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    function get($subject)
    {
        $resultcompetitor = $this->db->table($subject);
        return $resultcompetitor->get()->getResult();
    }

    function getchosen($table, $column, $value)
    {
        $resultchosen = $this->db->table($table)
        ->where($column, $value);
        return $resultchosen->get()->getResult();
    }
    
    function add($imie,$nazwisko,$dataur,$szkola_id,$zawody_id)
    {
        $this->db->query("INSERT INTO `tm_zawodnik` (`imie`, `nazwisko`, `data_urodzenia`, `szkola_id`, `zawody_id`) VALUES ('".$imie."', '".$nazwisko."', '".$dataur."', '".$szkola_id."', '".$zawody_id."')");
        return redirect()->to( base_url().'/main/compform' );
    }

}