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
        $data = [
            'meta_title' => 'Modyfikacja',
        ];
        if($_SESSION["zalogowany"] == "user1")
        {
            return view('modification',$data);
        }
        else
        {
            return view('gokartsMain',$data);
        }
    }
}