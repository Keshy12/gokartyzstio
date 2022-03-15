<?php

namespace App\Controllers;

class ArbiterController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();

        $data = [
            'meta_title' => 'Strona Sędziowska',
        ];

        return view('arbiter',$data);
    }
}