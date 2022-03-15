<?php

namespace App\Controllers;

use App\Models\LoginModel;

class LoginController extends BaseController
{
    public function login()
    {
        $session = \Config\Services::session();

        $db = db_connect();
        $model = new LoginModel($db);

        
        $data = [
            'meta_title' => 'Logowanie',
        ];
        if(isset($_POST["userName"]) && isset($_POST["userPassword"])) {
            $pass = $model->getPass($_POST['userName']);
            $login = $model->getLogin();
            if($_POST["userName"] == $login[0]->login && hash('sha256',$_POST['userPassword']) == $pass[0]->haslo) {
                $_SESSION["zalogowany"] = "user1";
                return view('gokartsMain',$data);
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
        return view('gokartsMain',$data);
    }
}