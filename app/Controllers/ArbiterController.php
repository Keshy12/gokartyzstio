<?php

namespace App\Controllers;

class ArbiterController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();

        $data = [
            'meta_title' => 'Tytuł strony',
        ];

        return view('arbiter',$data);
    }
}