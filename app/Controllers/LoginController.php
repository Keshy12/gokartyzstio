<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\BaseModel;

class LoginController extends BaseController
{
    public function login()
    {
        $data['meta_title'] = 'Logowanie';
        
        $db = db_connect();
        $model = new LoginModel($db);
        
        if(isset($_POST["userName"]) && isset($_POST["userPassword"])) {
            $login = $model->getLogin();
            foreach($login as $log)
            {
                if($_POST["userName"] == $log->login && hash('sha256',$_POST['userPassword']) == $log->haslo) {
                    $_SESSION["zalogowany"] = $log->permisje;
                    unset($_SESSION["info"]);
                    return view('gokartsMain',$data);
                } 
                else {
                    $_SESSION["info"] = "Dane nieprawidłowe. Spróbuj ponownie.";
                }
            }
        }
        return view('login',$data);
    }

    public function logout()
    {
        $_SESSION["zalogowany"] = "";
        return redirect()->to( base_url().'/main' ); 
    }
}