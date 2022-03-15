<?php

namespace App\Controllers;

class ArchiveController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();

        $data = [
            'meta_title' => 'Tytuł strony',
        ];

        return view('archive',$data);
    }
}