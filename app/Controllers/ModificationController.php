<?php

namespace App\Controllers;

use App\Models\BaseModel;

class ModificationController extends BaseController
{
    function index()
    {
        $data = BaseModel::setTitle('Archiwum');
        if($_SESSION["zalogowany"] == "pełny")
            return view('modification',$data);
            
        return view('gokartsMain',$data);
    }
}