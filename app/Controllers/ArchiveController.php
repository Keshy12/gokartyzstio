<?php

namespace App\Controllers;

use App\Models\ArchiveModel;

class ArchiveController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();

        $data = [
            'meta_title' => 'Archiwum',
        ];

        $db = db_connect();
        $model = new ArchiveModel($db);
        $result= $model->showAllCompetitions();
        $data['result']=$result;

        return view('archive',$data);
    }

    function archiveTable($id)
    {
        $db = db_connect();
        $model = new ArchiveModel($db);
        $result = $model->showSelectedCompetition($id);
        
        $data['resultleaderboard'] = $result;
        $data['i'] = 1;
        return view('scoreboard', $data);
    }
}