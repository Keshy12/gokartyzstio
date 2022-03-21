<?php

namespace App\Controllers;

class ModificationController extends BaseController
{
    function index()
    {
        if($this->request->getMethod() == 'post'){
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email',
                    'label' => 'Email adress',
                    'errors' => [
                        'required' => 'Email adress is a required field'
                    ],
                ],
                'password' => 'required|min_length[8]',
                'category' => 'in_list[Student, Teacher]',
                'date' => [
                    'rules' => 'required|check_date',
                    'label' => 'Date',
                    'errors' => [
                        'check_date' => 'You need to specify a date before today'
                    ]

                ]
                
            ];
    
            if($this->validate($rules)){
                //return redirect() -> to('/form/success');
                //Then do database insertion
                //Login user
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        $session = \Config\Services::session();
        if(!isset($_SESSION["zalogowany"]))
        {
            $_SESSION["zalogowany"] = "";
        };
        if(!isset($_SESSION["status"]))
        {
            $_SESSION["status"] = "";
        };
        $data = [
            'meta_title' => 'Modyfikacja',
        ];
        if($_SESSION["zalogowany"] == "pełny")
        {
            return view('modification',$data);
        }
        else
        {
            return view('gokartsMain',$data);
        }
    }
}