<?php

namespace App\Controllers;

use App\Models\LoginModel;

class LoginController extends BaseController
{
    public function login()
    {
        $session = \Config\Services::session();
        if(!isset($_SESSION["zalogowany"]))
        {
            $_SESSION["zalogowany"] = "";
        };
        $db = db_connect();
        $model = new LoginModel($db);

        
        $data = [
            'meta_title' => 'Logowanie',
        ];
        
        
        if(isset($_POST["userName"]) && isset($_POST["userPassword"])) {
            $login = $model->getLogin();
            foreach($login as $log)
            {
                if($_POST["userName"] == $log->login && hash('sha256',$_POST['userPassword']) == $log->haslo) {
                    $_SESSION["zalogowany"] = $log->permisje;
                    return view('gokartsMain',$data);
                } 
                else {
                    $_SESSION["info"] = "Dane nieprwidłowe. Spróbuj ponownie.";
                }
            }

            // if($_POST["userName"] == $login[0]->login && hash('sha256',$_POST['userPassword']) == $pass[0]->haslo) {
            //     $_SESSION["zalogowany"] = "user1";
            //     return view('gokartsMain',$data);
            // } 
            // else {
            //     $_SESSION["info"] = "Dane nieprwidłowe. Spróbuj ponownie.";
            // }
        }
        return view('login',$data);
    }

    public function logout()
    {
        $session = \Config\Services::session();

        $data = [
            'meta_title' => 'Wylogowanie',
        ];
        $_SESSION["zalogowany"] = "";
        return view('gokartsMain',$data);
    }
}