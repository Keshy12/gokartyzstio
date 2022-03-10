<?php

namespace App\Controllers;

// use App\Models\BlogModel;
// use App\Models\CustomModel;
class Gokarts extends BaseController
{
    public function index()
    {
        // $db = db_connect();
        // $model = new CustomModel($db);
        // echo '<pre>';
        //  print_r($model->getPosts());
        // echo '<pre>';


        // $data = [
        //     'meta_title' => 'Codeigniter 4 Blog',   
        //     'title' => 'This is a Blog Page',
        // ];
 
        return view('gokarts',$data);
    }
    
}
