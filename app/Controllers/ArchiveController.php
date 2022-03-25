<?php

namespace App\Controllers;

use App\Models\ArchiveModel;
use App\Models\BaseModel;

class ArchiveController extends BaseController
{
    function index()
    {
        $data['meta_title'] = 'Archiwum';

        $db = db_connect();
        $model = new ArchiveModel($db);
        $result= $model->showAllCompetitions();
        $data['result']=$result;

        return view('archive',$data);
    }

    function archiveTable($id)
    {
        $data['meta_title'] = 'Wyniki';

        $db = db_connect();
        $model = new ArchiveModel($db);

        $result = $model->showSelectedCompetition($id);
        foreach($result as $row)
            $row->czas = BaseModel::formatMilliseconds($row->czas);

        $data['resultleaderboard'] = $result;
        $data['i'] = 1;
        
        return view('scoreboard', $data);
    }
}