<?php

namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\AppendModel;

class AppendController extends BaseController
{
    function addSchool()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new AppendModel($db);

        $model->add('szkola', ['nazwa' => $_POST['school_name'], 'miasto_id' => $_POST['school_town'], 'akronim' => $_POST['school_acronym']]);
        
        return redirect()->to( base_url().'/main/mod' ); 
    }

    function addTown()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new AppendModel($db);

        $model->add('miasto', ['nazwa' => $_POST['town_name']]);
        return redirect()->to( base_url().'/main/mod' );
    }

    function addGokart()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');
            
        $db = db_connect();
        $model = new AppendModel($db);

        $model->add('gokart', ['nazwa' => $_POST['gokart_name']]);
        return redirect()->to( base_url().'/main/mod' );
    }
}