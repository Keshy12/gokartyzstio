<?php

namespace App\Controllers;
use App\Models\ArbiterModel;

class ArbiterController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();
        if(!isset($_SESSION["zalogowany"]))
        {
            $_SESSION["zalogowany"] = "";
        };
        $data = [
            'meta_title' => 'Strona Sędziowska',
        ];
        $db = db_connect();
        $model = new ArbiterModel($db);

        $status = $model->getStatus();

        if($_SESSION["zalogowany"] == "pełny" || $_SESSION["zalogowany"] == "limitowany")
        {   
            foreach($status as $stat)
            {
                if($stat->status_zawodow_id == 2)
                    return view('arbiter',$data);
            }
        }
        
        
        return view('gokartsMain',$data);
        
        
    }
}