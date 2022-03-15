<?php

namespace App\Controllers;

class ArchiveController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();

        $data = [
            'meta_title' => 'Archive',
        ];

        return view('archive',$data);
    }
}