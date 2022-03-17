<?php

namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\ArbiterModel;

class ArbiterController extends BaseController
{
    function index()
    {
        BaseModel::setSession();
        $data = BaseModel::setTitle('Strona Sędziowska');

        if(!($_SESSION["zalogowany"] == "pełny" XOR $_SESSION["zalogowany"] == "limitowany"))
            return view('gokartsMain',$data);

        $db = db_connect();
        $model = new ArbiterModel($db);
        
        $result = $model->comp_now();
        $result = array_merge($result, $model->comp_after());

        $data['result'] = $result;

        return view('arbiter',$data);
    }

    function disqualify()
    {
        if(!($_SESSION["zalogowany"] == "pełny" XOR $_SESSION["zalogowany"] == "limitowany"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ArbiterModel($db);

        $model->disqualify();

        return redirect()->to( base_url().'/main/judge' ); 
    }

    function addTime()
    {
        if(!($_SESSION["zalogowany"] == "pełny" XOR $_SESSION["zalogowany"] == "limitowany"))
            return redirect()->to( base_url().'/main');

        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ArbiterModel($db);

        $time = $model->convertTimeToInt($_POST['minutes'], $_POST['seconds'], $_POST['milliseconds']);
        $model->setTime($time);

        return redirect()->to( base_url().'/main/judge' ); 
    }
}