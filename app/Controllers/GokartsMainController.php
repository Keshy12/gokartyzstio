<?php

namespace App\Controllers;

use App\Models\BaseModel;

class GokartsMainController extends BaseController
{
    public function index()
    {
        BaseModel::setSession();
        $data = BaseModel::setTitle('Strona Główna');

        // $db = db_connect();
        // $model = new CustomModel($db);
        // echo '<pre>';
        //  print_r($model->getPosts());
        // echo '<pre>';
 
        return view('gokartsMain',$data);
    }
    
}