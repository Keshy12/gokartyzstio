<?php namespace App\Controllers;

use App\Models\GokartModel;

class GokartController extends BaseController
{

    public function index()
    {
        $db = db_connect();
        $model = new GokartModel($db);

        // $result_id = $model->jedzie();
        // $id = $result_id[0]->tmp_przejazd_id;
        
        // $result = $model->przejechany($id);
        // $result = array_merge($result, $result_id);
        // $result = array_merge($result, $model->nieprzejechany());

        // $data = ['result' => $result];

        // return view('zawody', $data);

    }

}