<?php

namespace App\Controllers;

use App\Models\BaseModel;

class ArbiterController extends BaseController
{
    function index()
    {
        BaseModel::setSession();
        $data = BaseModel::setTitle('Strona Sędziowska');

        if($_SESSION["zalogowany"] == "pełny" || $_SESSION["zalogowany"] == "limitowany" )
        {
            return view('arbiter',$data);
        }
        else
        {
            return view('gokartsMain',$data);
        }
        
    }
}