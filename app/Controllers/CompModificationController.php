<?php

namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\CompModificationModel;

class CompModificationController extends BaseController
{

    function addComp()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new CompModificationModel($db);

        $model->add('zawody', ['nazwa' => $_POST['competition_name'], 'data_rozpoczecia' => $_POST['competition_start_date'], 'status_zawodow_id' => 1]);
        return redirect()->to( base_url().'/main/mod' ); 
    }

    function beginComp()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new CompModificationModel($db);
        
        $model->changeState($_POST['competition_id'], '2');

        return redirect()->to( base_url().'/main/mod' ); 
    }

    function finishConp()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');
        
        $db = db_connect();
        $model = new CompModificationModel($db);
        
        $model->changeState($_POST['competition_id'], '3');

        return redirect()->to( base_url().'/main/mod' ); 
    }
}