<?php namespace App\Models;


use CodeIgniter\Database\ConnectionInterface;


class ModificationModel{

    protected $db;

    public function __construct(ConnectionInterface $db){
        $this->db =& $db;
    }

    function getcompetitor()
    {
        $resultcompetitor = $this->db->table('tm_zawodnik');

        return $resultcompetitor->get()->getResult();
    }

    function getschool()
    {
        $resultcompetitor = $this->db->table('szkola');
              
        return $resultcompetitor->get()->getResult();
    }

    function getchosen($id)
    {
        
        $resultchosen = $this->db->table('tm_zawodnik')
        ->where('tm_zawodnik_id', $id);

        return $resultchosen->get()->getResult();
    }
}