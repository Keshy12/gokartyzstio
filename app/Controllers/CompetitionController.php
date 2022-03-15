<?php

namespace App\Controllers;

use App\Models\CompetitionModel;

class CompetitionController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();

        $data = [
            'meta_title' => 'Tytuł strony',
        ];
        ///////
        $db = db_connect();
        $model = new CompetitionModel($db);

        $result_id = $model->comp_now();
        if(!$result_id)
            return redirect()->to('gokarts');

        $id = $result_id[0]->tm_przejazd_id;

        $result = $model->comp_before($id);
        foreach($result as $row)
            $row->czas = $model->formatMilliseconds($row->czas);
        $result = array_merge($result, $result_id);
        $result = array_merge($result, $model->comp_after());

        $data['result'] = $result;

        //////
        //////
        $resultleaderboard=$model->leaderboard();
        foreach($resultleaderboard as $row)
            $row->czas = $model->formatMilliseconds($row->czas);
        $data['resultleaderboard']= $resultleaderboard;
        $data['i']=1;

        //////
        
        return view('competition',$data);
    }
}