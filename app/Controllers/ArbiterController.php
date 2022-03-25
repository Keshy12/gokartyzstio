<?php

namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\ArbiterModel;

class ArbiterController extends BaseController
{
    function index()
    {
        $data['meta_title'] = 'Strona Sędziowska';

        if(!($_SESSION["zalogowany"] == "pełny" XOR $_SESSION["zalogowany"] == "limitowany"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ArbiterModel($db);
        
        $result = $model->comp_now();
        $result = array_merge($result, $model->comp_after());

        $data['result'] = $result;

        return view('arbiter',$data);
    }

    function disqualify()
    {
        if(!($_SESSION["zalogowany"] == "pełny" XOR $_SESSION["zalogowany"] == "limitowany"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ArbiterModel($db);
        $model->disqualify();
        return redirect()->to( base_url().'/main/judge' ); 
    }

    function addTime()
    {
        if(!($_SESSION["zalogowany"] == "pełny" XOR $_SESSION["zalogowany"] == "limitowany"))
            return redirect()->to( base_url().'/main');
            
        $db = db_connect();
        $model = new ArbiterModel($db);
        if($this->request->getMethod() == 'post'){
            $rules = [
                'minutes' => [
                    'rules' => 'required|numeric|less_than[60]',
                    'label' => 'minuty',
                    'errors' => [
                        'required' => 'Minuty są wymagane',
                        'numeric' => 'Używaj tylko cyfr',
                        'less_than' => 'Wpisz mniej niż 60 minut',
                    ],
                ],
                'seconds' => [
                    'rules' => 'required|numeric|less_than[60]',
                    'label' => 'sekundy',
                    'errors' => [
                        'required' => 'Sekundy są wymagane',
                        'numeric' => 'Używaj tylko cyfr',
                        'less_than' => 'Wpisz mniej niż 60 sekund',
                    ],
                ],
                'milliseconds' => [
                    'rules' => 'required|numeric|less_than[1000]',
                    'label' => 'milisekundy',
                    'errors' => [
                        'required' => 'Milisekundy są wymagane',
                        'numeric' => 'Używaj tylko cyfr',
                        'less_than' => 'Wpisz mniej niż 1000 milisekund',
                    ],
                ],
            ];
            if($this->validate($rules)){
                $time = $model->convertTimeToInt($_POST['minutes'], $_POST['seconds'], $_POST['milliseconds']);
                $model->setTime($time);
                echo $time;
            }
            else
            {
                $_SESSION['validation'] = $this->validator->listErrors();  
            }
        }


        return redirect()->to( base_url().'/main/judge' ); 
    }
}