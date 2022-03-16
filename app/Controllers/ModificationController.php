<?php

namespace App\Controllers;

class ModificationController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();
        if(!isset($_SESSION["zalogowany"]))
        {
            $_SESSION["zalogowany"] = "";
        };
        if(!isset($_SESSION["status"]))
        {
            $_SESSION["status"] = "";
        };
        $data = [
            'meta_title' => 'Modyfikacja',
        ];
        if($_SESSION["zalogowany"] == "pełny")
        {
            return view('modification',$data);
        }
        else
        {
            return view('gokartsMain',$data);
        }
    }
}