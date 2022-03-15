<?php

namespace App\Controllers;

class ArchiveController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();
        if(!isset($_SESSION["zalogowany"]))
        {
            $_SESSION["zalogowany"] = "";
        };

        $data = [
            'meta_title' => 'Archiwum',
        ];

        return view('archive',$data);
    }
}