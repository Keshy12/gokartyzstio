<?php

namespace App\Controllers;

class Form extends BaseController
{
    public function index()
    {
        helper(['form']);

        $data = []; 
        $data['categories'] = [
            'Student',
            'Teacher',
            'Principle'
            
        ];


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

        return view('form', $data);
    }

    function success(){
        //echo 'Hey, you habe passed the validation. Congrats!';
    }


}

