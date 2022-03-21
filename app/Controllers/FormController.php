<?php

namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\FormModel;

class FormController extends BaseController
{
    function index()
    {
        if(!($_SESSION["zalogowany"] == "pełny" XOR $_SESSION["zalogowany"] == "limitowany")){
            return view('gokartsMain');
        }

            $db = db_connect();
            $model = new FormModel($db);

            $data = [
                'meta_title' => 'Zgłoszenie',
            ];

            $data['competitiondata']=$model->get('zawody');
            $data['schooldata']=$model->get('szkola');

            return view('competitorform', $data);
        
    }

    function add()
    {
        if(!($_SESSION["zalogowany"] == "pełny" XOR $_SESSION["zalogowany"] == "limitowany")){
            return view('gokartsMain');
        }

            $db = db_connect();
            $model = new FormModel($db);

            $data = [
                'meta_title' => 'Zgłoszenie',
            ];
            
            $model->add($_POST['imie'], $_POST['nazwisko'], $_POST['dataur'], $_POST['szkola_id'], $_POST['zawody_id']);

            return redirect()->to( base_url().'/main/compform' );

    }

}