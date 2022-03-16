<?php

namespace App\Controllers;

use App\Models\CompetitionModel;
use App\Models\BaseModel;

class CompetitionController extends BaseController
{
    function index()
    {
        BaseModel::setSession();
        $data = BaseModel::setTitle('Zawody');

        ///////
        $db = db_connect();
        $model = new CompetitionModel($db);

        $result_id = $model->comp_now();
        if(!$result_id)
            return redirect()->to('main/score');

        $id = $result_id[0]->tm_przejazd_id;

        $result = $model->comp_before();
        foreach($result as $row)
            $row->czas = BaseModel::formatMilliseconds($row->czas);
        $result = array_merge($result, $result_id);
        $result = array_merge($result, $model->comp_after());

        $data['result'] = $result;

        //////
        //////
        $resultleaderboard=$model->leaderboard(8);
        foreach($resultleaderboard as $row)
            $row->czas = BaseModel::formatMilliseconds($row->czas);

        $data['resultleaderboard'] = $resultleaderboard;
        $data['i']=1;

        //////

        return view('competition',$data);
    }

    function scoreboard()
    {
        BaseModel::setSession();
        $data = BaseModel::setTitle('Wyniki');

        $db = db_connect();
        $model = new CompetitionModel($db);

        $result = $model->leaderboard(-1);
        foreach($result as $row)
            $row->czas = BaseModel::formatMilliseconds($row->czas);

        $data['resultleaderboard'] = $result;
        $data['i'] = 1;

        return view('scoreboard',$data);
    }
}