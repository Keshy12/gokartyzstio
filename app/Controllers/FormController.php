<?php

namespace App\Controllers;

use App\Models\BaseModel;

class FormController extends BaseController
{
    function index()
    {
        if(!($_SESSION["zalogowany"] == "pełny" XOR $_SESSION["zalogowany"] == "limitowany")){
            return view('gokartsMain');
        }
        else
        {
            return view('competitorform');
        }
        
    }

}