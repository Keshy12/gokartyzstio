<?php

namespace App\Models;

use CodeIgniter\Model;

class GokartyModel extends Model
{
    protected $table      = 'uzytkownik';
    protected $primaryKey = 'uzytkownik_id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // protected $allowedFields = ['post_title', 'post_content'];

    // protected $useTimestamps = true;
    // protected $createdField  = 'post_created_at';
    // protected $updatedField  = 'post_updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function getPass()
    {
        $query = $this->db->get('haslo');
        return $query->result();
    }

    public function getLogin(){
        $query = $this->db->get('login');
        return $query->result();
    }


}