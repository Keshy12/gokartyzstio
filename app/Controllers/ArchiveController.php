<?php

namespace App\Controllers;

use App\Models\ArchiveModel;

class ArchiveController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();

        $data = [
            'meta_title' => 'Archive',
        ];

        $db = db_connect();
        $model = new ArchiveModel($db);
        $result= $model->showAllCompetitions();
        $data['result']=$result;
        $data['i']=1;
        $data['j']=1;

        return view('archive',$data);
    }
}