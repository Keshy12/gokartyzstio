<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\BaseModel;

class LoginController extends BaseController
{
    public function login()
    {
        BaseModel::setSession();
        $data = BaseModel::setTitle('Logowanie');

        $db = db_connect();
        $model = new LoginModel($db);

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
        BaseModel::setSession();
        $data = BaseModel::setTitle('Wylogowanie');

        $_SESSION["zalogowany"] = "";
        return view('gokartsMain',$data);
    }
}