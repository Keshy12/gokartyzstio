<?php

namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\AppendModel;

class AppendController extends BaseController
{
    function addSchool()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new AppendModel($db);
        if($this->request->getMethod() == 'post'){
            $rules = [
                'school_name' => [
                    'rules' => 'required',
                    'label' => 'nazwa_szkoly',
                    'errors' => [
                        'required' => 'Nazwa szkoły jest wymagana.',
                    ],
                ],
                'school_acronym' => [
                    'rules' => 'required|regex_match[/^[A-Za-z ZĄĆĘŁŃÓŚŹŻąćęłńóśźż0-9]*$/iu]',
                    'label' => 'akronim_szkoly',
                    'errors' => [
                        'required' => 'Akronim szkoły jest wymagany',
                        'regex_match' => 'W akronimie używaj tylko polskich znaków.',
                    ],
                ],
            ];
            if($this->validate($rules)){
                unset($_SESSION['validation']);
                $model->add('szkola', ['nazwa' => $_POST['school_name'], 'miasto_id' => $_POST['school_town'], 'akronim' => $_POST['school_acronym']]);
                return redirect()->to( base_url().'/main/mod' );
            }
            else
            {
                $_SESSION['validation'] = $this->validator->listErrors();    
            }
        }
        
        
        return redirect()->to( base_url().'/main/mod' ); 
    }

    function addTown()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new AppendModel($db);
        if($this->request->getMethod() == 'post'){
            $rules = [
                'town_name' => [
                    'rules' => 'required|regex_match[/^[A-Za-z /-ZĄĆĘŁŃÓŚŹŻąćęłńóśźż]*$/iu]',
                    'label' => 'nazwa miasta',
                    'errors' => [
                        'required' => 'Nazwa miasta jest wymagana',
                        'regex_match' => 'W nazwie miasta używaj tylko polskich znaków.',
                    ],
                ],
            ];
            if($this->validate($rules)){
                unset($_SESSION['validation']);
                $model->add('miasto', ['nazwa' => $_POST['town_name']]);
                return redirect()->to( base_url().'/main/mod' );
            }
            else
            {
                $_SESSION['validation'] = $this->validator->listErrors();    
            }
        }
        
        return redirect()->to( base_url().'/main/mod' );
    }

    function addGokart()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');
            
        $db = db_connect();
        $model = new AppendModel($db);
        if($this->request->getMethod() == 'post'){
            $rules = [
                'gokart_name' => [
                    'rules' => 'required|regex_match[/^[A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ" "]*$/iu]',
                    'label' => 'nazwa gokartu',
                    'errors' => [
                        'required' => 'Nazwa gokarta jest wymagana',
                        'regex_match' => 'W nazwie gokartu używaj tylko polskich znaków.',
                    ],
                ],
            ];
            if($this->validate($rules)){
                unset($_SESSION['validation']);
                $model->add('gokart', ['nazwa' => $_POST['gokart_name']]);
                return redirect()->to( base_url().'/main/mod' );
            }
            else
            {
                $_SESSION['validation'] = $this->validator->listErrors();    
            }
        }
        
        return redirect()->to( base_url().'/main/mod' );
    }
}