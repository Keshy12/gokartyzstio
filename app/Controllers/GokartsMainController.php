<?php

namespace App\Controllers;

class GokartsMainController extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        // $db = db_connect();
        // $model = new CustomModel($db);
        // echo '<pre>';
        //  print_r($model->getPosts());
        // echo '<pre>';

        $data = [
            'meta_title' => 'Tytuł strony',
        ];
 
        return view('gokartsMain',$data);
    }
    
}