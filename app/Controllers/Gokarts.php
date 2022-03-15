<?php

namespace App\Controllers;

use App\Models\GokartModel;

// use App\Models\BlogModel;
use App\Models\CustomModel;

class Gokarts extends BaseController
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
 
        return view('gokarts',$data);
    }

    public function login()
    {
        $session = \Config\Services::session();

        $db = db_connect();
        $model = new CustomModel($db);

        
        $data = [
            'meta_title' => 'Tytuł strony',
        ];
        if(isset($_POST["userName"]) && isset($_POST["userPassword"])) {
            $pass = $model->getPass($_POST['userName']);
            if(hash('sha256',$_POST['userPassword']) == $pass[0]->haslo) {
                $_SESSION["zalogowany"] = "user1";
                return view('gokarts',$data);
            } 
            else {
                $_SESSION["info"] = "Dane nieprwidłowe. Spróbuj ponownie.";
            }
        }
        return view('login',$data);
    }


    public function logout()
    {
        $session = \Config\Services::session();
        

        $data = [
            'meta_title' => 'Tytuł strony',
        ];
        unset($_SESSION["zalogowany"]);
        return view('gokarts',$data);
    }

    public function zawody()
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
        ///////
        $db = db_connect();
        $model = new GokartModel($db);

        $result_id = $model->comp_now();
        if(!$result_id)
            return redirect()->to('gokarts');

        $id = $result_id[0]->tm_przejazd_id;

        $result = $model->comp_before($id);
        $result = array_merge($result, $result_id);
        $result = array_merge($result, $model->comp_after());

        $data['result'] = $result;

        //////
        //////
        $resultleaderboard=$model->leaderboard();
        $data['resultleaderboard']= $resultleaderboard;
        $data['i']=1;
        //////
        return view('zawody',$data);
    }

    public function archiwum()
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

        return view('archiwum',$data);
    }
    
}