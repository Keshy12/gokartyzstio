<?php

namespace App\Controllers;

use App\Models\BaseModel;

class ModificationController extends BaseController
{
    function index()
    {
        BaseModel::setSession();
        $data = BaseModel::setTitle('Modyfikacja');

        if($_SESSION["zalogowany"] == "pełny")
            return view('modification',$data);
            
        return view('gokartsMain',$data);
    }
}