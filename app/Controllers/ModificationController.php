<?php

namespace App\Controllers;
use App\Models\ModificationModel;

class ModificationController extends BaseController
{   
    public function index()
    {
        $data = [];     
        if(!isset($_SESSION["zalogowany"]))
        {
            $_SESSION["zalogowany"] = "";
        };
        $data += [
            'meta_title' => 'Modyfikacja',
        ];
        if($_SESSION["zalogowany"] != "pełny")
            return view('gokartsMain',$data);

        $db = db_connect();
        $model = new ModificationModel($db);
        
        if(!isset($_COOKIE['school']))
        {
            $_COOKIE['school']=(int)$model->getfirstid('szkola')[0]->szkola_id;
        };

        if(!isset($_COOKIE['city']))
        {
            $_COOKIE['city']=(int)$model->getfirstid('miasto')[0]->miasto_id;
        };

        if(!isset($_COOKIE['ride']))
        {
            $_COOKIE['ride'] = (isset($model->getfirstid('tm_przejazd')[0]->tm_przejazd_id)) ? $model->getfirstid('tm_przejazd')[0]->tm_przejazd_id : 0;
        };
       
        if(!isset($_COOKIE['competitor']))
        {
            $_COOKIE['competitor'] = (isset($model->getfirstid('tm_zawodnik')[0]->tm_zawodnik_id)) ? $model->getfirstid('tm_zawodnik')[0]->tm_zawodnik_id : 0;
        };

        if(!isset($_COOKIE['gokart']))
        {
            $_COOKIE['gokart']=(int)$model->getfirstid('gokart')[0]->gokart_id;
        };  
        if(!isset($_COOKIE['competition']))
        {
            $_COOKIE['competition']=(int)$model->getfirstid('zawody')[0]->zawody_id;
        };   


        $data['competitordata']=$model->get('tm_zawodnik');
        $data['schooldata']=$model->get('szkola');
        $data['gokartdata']=$model->get('gokart');
        $data['competitiondata']=$model->get('zawody');
        $data['statusdata']=$model->get('status_przejazdu');
        $data['citydata']=$model->get('miasto');
        $data['ridedata']=$model->getride();

        $data['chosenschooldata']=$model->getchosen('szkola', 'szkola_id', (int)$_COOKIE['school']);
        $data['chosenridedata']=$model->getchosenride((int)$_COOKIE['ride']);  
        $data['chosengokartdata']=$model->getchosen('gokart', 'gokart_id', (int)$_COOKIE['gokart']);
        $data['chosencitydata']=$model->getchosen('miasto', 'miasto_id', (int)$_COOKIE['city']);
        $data['chosencompetitordata']=$model->getchosen('tm_zawodnik', 'tm_zawodnik_id', (int)$_COOKIE['competitor']);
        $data['chosencompetitiondata']=$model->getchosen('zawody', 'zawody_id', (int)$_COOKIE['competition']);

        $data['comp_chosencompetitiondata']=$model->getchosen('zawody', 'status_zawodow_id', '1');
        $data['comp_numberOfRows']=$model->getNumberOfRows('zawody', 'status_zawodow_id', '2')[0]->numberOfRows;
        $data['comp_chosenactivecompetition']=$model->getchosen('zawody', 'status_zawodow_id', '2');        
        return view('modification',$data);   
        
    }

    public function modifycompetitor()
    {        
        if(!isset($_SESSION["zalogowany"]))
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');
        $db = db_connect();
        $model = new ModificationModel($db);
        if($this->request->getMethod() == 'post'){
            $rules = [
                'competitor_name' => [
                    'rules' => 'required|regex_match[/^[A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ]*$/iu]',
                    'label' => 'Imie',
                    'errors' => [
                        'required' => 'Imie jest wymagane',
                        'regex_match' => 'Używaj tylko liter alfabetu'
                    ],
                ],
                'competitor_surname' => [
                    'rules' => 'required|regex_match[/^[A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ]*$/iu]',
                    'label' => 'Nazwisko',
                    'errors' => [
                        'required' => 'Nazwisko jest wymagane',
                        'regex_match' => 'Używaj tylko liter alfabetu'
                    ],
                ],
            ];
            if($this->validate($rules)){
                unset($_SESSION['validation']);
                $model->modifycompetitor($_POST['competitor_picker'],$_POST['competitor_name'],$_POST['competitor_surname'],$_POST['competitor_date'],$_POST['competitor_school'],$_POST['competitor_competition']);
                return redirect()->to( base_url().'/main/mod' );
            }
            else
            {
                $_SESSION['validation'] = $this->validator->listErrors();    
            }
        }
    
        return redirect()->to( base_url().'/main/mod' );
    }

    public function modifyride()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ModificationModel($db);
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
                'miliseconds' => [
                    'rules' => 'required|numeric|less_than[1000]',
                    'label' => 'milisekundy',
                    'errors' => [
                        'required' => 'Sekundy są wymagane',
                        'numeric' => 'Używaj tylko cyfr',
                        'less_than' => 'Wpisz mniej niż 1000 milisekund',
                    ],
                ],
            ];
            if($this->validate($rules)){
                unset($_SESSION['validation']);
                $time=(int)$_POST['minutes']*60000+(int)$_POST['seconds']*1000+(int)$_POST['miliseconds'];
                $model->modifyride($_POST['ride_picker'],$_POST['ride_gokart'],$time);
                
                return redirect()->to( base_url().'/main/mod' );
            }
            else
            {
                $_SESSION['validation'] = $this->validator->listErrors();    
            }
        }
        
        return redirect()->to( base_url().'/main/mod' );
    }

    public function modifyschool()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ModificationModel($db);
        if($this->request->getMethod() == 'post'){
            $rules = [
                'school_name' => [
                    'rules' => 'required',
                    'label' => 'nazwa_szkoly',
                    'errors' => [
                        'required' => 'Nazwa szkoły jest wymagana',
                    ],
                ],
                'school_acronym' => [
                    'rules' => 'required|regex_match[/^[A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ" "]*$/iu]',
                    'label' => 'akronim_szkoly',
                    'errors' => [
                        'required' => 'Akronim szkoły jest wymagana',
                        'regex_match' => 'W akronimie używaj tylko polskich znaków.',
                    ],
                ],
            ];
            if($this->validate($rules)){
                unset($_SESSION['validation']);
                $model->modifyschool($_POST['school_picker'],$_POST['school_name'],$_POST['school_town'],$_POST['school_acronym']);
                return redirect()->to( base_url().'/main/mod' );
            }
            else
            {
                $_SESSION['validation'] = $this->validator->listErrors();    
            }
        }        
        return redirect()->to( base_url().'/main/mod' );
    }

    public function modifygokart()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ModificationModel($db);
        if($this->request->getMethod() == 'post'){
            $rules = [
                'gokart_name' => [
                    'rules' => 'required|regex_match[/^[A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ" "]*$/iu]',
                    'label' => 'nazwa_gokartu',
                    'errors' => [
                        'required' => 'Nazwa gokartu jest wymagana.',
                        'regex_match' => 'W nazwie gokartu używaj tylko polskich znaków.'
                    ],
                ],
            ];
            if($this->validate($rules)){
                unset($_SESSION['validation']);
                $model->modifygokart($_POST['gokart_picker'],$_POST['gokart_name']);
                return redirect()->to( base_url().'/main/mod' );
            }
            else
            {
                $_SESSION['validation'] = $this->validator->listErrors();    
            }
        }        
        return redirect()->to( base_url().'/main/mod' );
        
    }

    public function modifycompetition()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ModificationModel($db);
        if($this->request->getMethod() == 'post'){
            $rules = [
                'competition_name' => [
                    'rules' => 'required',
                    'label' => 'nazwa_zawodow',
                    'errors' => [
                        'required' => 'Nazwa zawodów jest wymagana.',
                    ],
                ],
            ];
            if($this->validate($rules)){
                unset($_SESSION['validation']);
                $model->modifycompetition($_POST['competition_picker'],$_POST['competition_name'],$_POST['competition_start_date'],$_POST['competition_end_date']);
                return redirect()->to( base_url().'/main/mod' );
            }
            else
            {
                $_SESSION['validation'] = $this->validator->listErrors();    
            }
        }        
        return redirect()->to( base_url().'/main/mod' );
        
    }

    public function modifycity()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ModificationModel($db);
        if($this->request->getMethod() == 'post'){
            $rules = [
                'competition_name' => [
                    'rules' => 'required',
                    'label' => 'nazwa_zawodow',
                    'errors' => [
                        'required' => 'Nazwa zawodów jest wymagana.',
                    ],
                ],
            ];
            if($this->validate($rules)){
                unset($_SESSION['validation']);
                $model->modifycity($_POST['city_picker'],$_POST['city_name']);
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