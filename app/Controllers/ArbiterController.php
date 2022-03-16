<?php

namespace App\Controllers;

class ArbiterController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();
        if(!isset($_SESSION["zalogowany"]))
        {
            $_SESSION["zalogowany"] = "";
        };
        $data = [
            'meta_title' => 'Strona Sędziowska',
        ];

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