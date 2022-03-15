<?php

namespace App\Controllers;

class ModificationController extends BaseController
{
    function index()
    {
        $session = \Config\Services::session();

        $data = [
            'meta_title' => 'Modification',
        ];

        return view('modification',$data);
    }
}