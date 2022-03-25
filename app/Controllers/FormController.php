<?php

namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\FormModel;

class FormController extends BaseController
{
    function index()
    {
        if(!($_SESSION["zalogowany"] == "pełny" XOR $_SESSION["zalogowany"] == "limitowany"))
            return view('gokartsMain');

            $data['meta_title'] = 'Zgłoszenie';

            $db = db_connect();
            $model = new FormModel($db);

            $data['competitiondata']=$model->getchosen('zawody', 'status_zawodow_id', '1');
            $data['schooldata']=$model->get('szkola');

            return view('competitorform', $data);
    }

    function add()
    {
        if(!($_SESSION["zalogowany"] == "pełny" XOR $_SESSION["zalogowany"] == "limitowany"))
            return view('gokartsMain');
        
        $data['meta_title'] = 'Zgłoszenie';

        $db = db_connect();
        $model = new FormModel($db);
            
        if($this->request->getMethod() == 'post'){
            $rules = [
                'imie' => [
                    'rules' => 'required|regex_match[/^[a-zA-ZZĄĆĘŁŃÓŚŹŻąćęłńóśźż]*$/iu]',
                    'label' => 'Imie',
                    'errors' => [
                        'required' => 'Imie jest wymagane',
                        'regex_match' => 'W imieniu używaj tylko liter alfabetu'
                    ],
                ],
                'nazwisko' => [
                    'rules' => 'required|regex_match[/^[a-zA-ZĄĆĘŁŃÓŚŹŻąćęłńóśźż]*([\- ]{1}[a-zA-ZĄĆĘŁŃÓŚŹŻąćęłńóśźż]*)?([ ]{1}[0-9]{1}[a-zA-Z]{1,4})?$/iu]',
                    'label' => 'Nazwisko',
                    'errors' => [
                        'required' => 'Nazwisko jest wymagane',
                        'regex_match' => 'W nazwisko używaj tylko liter alfabetu'
                    ],
                ],
            ];
            if($this->validate($rules)){
                $model->add($_POST['imie'], $_POST['nazwisko'], $_POST['dataur'], $_POST['szkola_id'], $_POST['zawody_id']);
                return redirect()->to( base_url().'/main/compform' );

            }
            else
            {
                $_SESSION['validation'] = $this->validator->listErrors();    
            }
        }
        return redirect()->to( base_url().'/main/compform' );
    }
}