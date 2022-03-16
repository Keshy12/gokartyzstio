<?php

namespace App\Controllers;
use App\Models\ArbiterModel;

class FormController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();
        if(!isset($_SESSION["zalogowany"]))
        {
            $_SESSION["zalogowany"] = "";
        };
        if(!isset($_SESSION["status"]))
        {
            $_SESSION["status"] = "";
        };
        $data = [
            'meta_title' => 'Strona Sędziowska',
        ];
        $db = db_connect();
        $model = new ArbiterModel($db);

        $status = $model->getStatus();

        foreach($status as $stat)
        {
            if($stat->status_zawodow_id == 1)
                $_SESSION["status"] == "zaplanowane";
        }

        
        
        return view('gokartsMain',$data);
        
        
    }
}