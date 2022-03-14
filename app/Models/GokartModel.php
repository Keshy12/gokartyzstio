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
        $result = $this->db->table('tmp_przejazd');
        $result->where('status_zawodnika_id', 2);
        $result = $this->join($result);
        return $result->get()->getResult();
    }

    function przejechany($id)
    {
        $result = $this->db->table('tmp_przejazd');
        $result->where('status_zawodnika_id', 1);
        if($id > 2) 
            $result->where('tmp_przejazd_id >=', $id-2);
        $result = $this->join($result);
        $result->join('czas', 'przejazd_id');
        return $result->get(2)->getResult();
    }

    function nieprzejechany()
    {
        $result = $this->db->table('tmp_przejazd');
        $result->where('status_zawodnika_id', 3);
        $result = $this->join($result);
        return $result->get(2)->getResult();
    }

    

    function join($result)
    {
        $result->join('przejazd', 'przejazd_id');
        $result->join('zawodnik', 'zawodnik_id');
        return $result;
    }

}