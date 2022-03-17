<?php

namespace App\Controllers;

use App\Models\BaseModel;

class FormController extends BaseController
{
    function index()
    {
        $data = BaseModel::setTitle('Archiwum');
        if(!($_SESSION["zalogowany"] == "pełny" XOR $_SESSION["zalogowany"] == "limitowany"))
        {
            return view('competitor_form',$data);
        }
    }
}