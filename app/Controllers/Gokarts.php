<?php

namespace App\Controllers;

use App\Models\ZawodyModel;

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
            'meta_title' => 'Strona Główna',
        ];
 
        return view('gokarts',$data);
    }

    public function login()
    {
        $session = \Config\Services::session();

        $db = db_connect();
        $model = new CustomModel($db);

        
        $data = [
            'meta_title' => 'Logowanie',
        ];
        if(isset($_POST["userName"]) && isset($_POST["userPassword"])) {
            $pass = $model->getPass($_POST['userName']);
            $login = $model->getLogin();
            if($_POST["userName"] == $login[0]->login && hash('sha256',$_POST['userPassword']) == $pass[0]->haslo) {
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
            'meta_title' => 'Wylogowanie',
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
            'meta_title' => 'Zawody',
        ];
        ///////
        $db = db_connect();
        $model = new ZawodyModel($db);

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
        foreach($resultleaderboard as $row)
        {
            $row->czas = $model->formatMilliseconds($row->czas);
        }
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
            'meta_title' => 'Archiwum',
        ];

        return view('archiwum',$data);
    }

    public function arbiter()
    {
        $session = \Config\Services::session();
        // $db = db_connect();
        // $model = new CustomModel($db);
        // echo '<pre>';
        //  print_r($model->getPosts());
        // echo '<pre>';


        $data = [
            'meta_title' => 'Strona Sędziowska',
        ];

        return view('arbiter',$data);
    }

    public function modification()
    {
        $session = \Config\Services::session();
        // $db = db_connect();
        // $model = new CustomModel($db);
        // echo '<pre>';
        //  print_r($model->getPosts());
        // echo '<pre>';


        $data = [
            'meta_title' => 'Modyfikacja',
        ];

        return view('modification',$data);
    }

    public function ee()
    {
        $session = \Config\Services::session();
        // $db = db_connect();
        // $model = new CustomModel($db);
        // echo '<pre>';
        //  print_r($model->getPosts());
        // echo '<pre>';


        $data = [
            'meta_title' => 'EasterEgg',
        ];

        return view('ee',$data);
    }
    
}