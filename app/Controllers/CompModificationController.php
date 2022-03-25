<?php

namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\CompModificationModel;

class CompModificationController extends BaseController
{

    function addComp()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new CompModificationModel($db);
        if($this->request->getMethod() == 'post'){
            $rules = [
                'competition_name' => [
                    'rules' => 'required',
                    'label' => 'nazwa zawodów',
                    'errors' => [
                        'required' => 'Nazwa zawodów jest wymagana',
                    ],
                ],
            ];
            if($this->validate($rules)){
                unset($_SESSION['validation']);
                $model->add('zawody', ['nazwa' => $_POST['competition_name'], 'data_rozpoczecia' => $_POST['competition_start_date'], 'status_zawodow_id' => 1]);
                return redirect()->to( base_url().'/main/mod' );
            }
            else
            {
                $_SESSION['validation'] = $this->validator->listErrors();    
            }
        }
        return redirect()->to( base_url().'/main/mod' ); 
    }

    function beginComp()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new CompModificationModel($db);
        
        $model->changeState($_POST['competition_id'], '2');

        return redirect()->to( base_url().'/main/mod' ); 
    }

    function finishConp()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');
        
        $db = db_connect();
        $model = new CompModificationModel($db);

        if(count($model->getWithJoin('tm_przejazd', ['tm_zawodnik', 'tm_zawodnik_id'])) == 0)
        {
            $model->remove('tm_zawodnik', 'zawody_id', $_POST['competition_id']);
            $model->remove('zawody', 'zawody_id', $_POST['competition_id']);

            unset($_COOKIE['competition']);
            $id = (isset($model->getfirstid('zawody')[0]->zawody_id)) ? $model->getfirstid('zawody')[0]->zawody_id : 0;
            $_SESSION['deleteCompetition'] = $id;

            unset($_COOKIE['competitor']);
            $id = (isset($model->getfirstid('tm_zawodnik')[0]->tm_zawodnik_id)) ? $model->getfirstid('tm_zawodnik')[0]->tm_zawodnik_id : 0;
            $_SESSION['deleteCompetitor'] = $id;

            return redirect()->to( base_url().'/main/mod' ); 
        }

        $ride = $model->getWithJoin('tm_przejazd', ['tm_zawodnik', 'tm_zawodnik_id']);

        foreach($ride as $index=>$row)
        {
            $model->add('archiwum', ['imie' => $row->imie, 'nazwisko' => $row->nazwisko, 'gokart_id' => $row->gokart_id, 'czas' => $row->czas, 'szkola_id' => $row->szkola_id, 'zawody_id' => $row->zawody_id]);
            $model->remove('tm_przejazd', 'tm_przejazd_id', $row->tm_przejazd_id);
        }
        
        $model->remove('tm_zawodnik', 'zawody_id', $_POST['competition_id']);

        $model->changeState($_POST['competition_id'], '3');
        $model->updateDate($_POST['competition_id']);

        return redirect()->to( base_url().'/main/mod' ); 
    }

    function randomConp()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');
        

        $db = db_connect();
        $model = new CompModificationModel($db);
        $competitorsArray = [];
        

        $competitorsId = $model->getId();
       
        foreach($competitorsId as $row)
            array_push($competitorsArray, $row->tm_zawodnik_id);
            
        $competitorsArraycount = count($competitorsArray)+1;
        if($this->request->getMethod() == 'post'){
            $rules = [
                'ride_amount' => [
                    'rules' => "required|is_natural_no_zero|less_than[{$competitorsArraycount}]",
                    'label' => 'limit_przejazdow',
                    'errors' => [
                        'required' => 'Limit przejazdów jest wymagany.',
                        'is_natural_no_zero' => 'Limit przejazdów przyjmuje tylko liczby naturalne.',
                        'less_than' => 'Liczba przejazdów przekracza liczbę uczestników.',
                    ],
                ],
            ];
            if($this->validate($rules)){
                switch(count($_POST['gokartSelected']) == 1)
                {
                    case true:
                        if(!isset($_SESSION['validation']))
                            $_SESSION['validation'] = "";
                        $_SESSION['validation'].="<ul><li>Nie wybrano gokarty.</li></ul>";
                        return redirect()->to( base_url().'/main/mod' ); 
                        break;
                }
                unset($_SESSION['validation']);
                $gokartsArray = $_POST['gokartSelected'];
                $gokartCount = count($gokartsArray);
                $competition = $model->ridesOrder($competitorsArray, $_POST['ride_amount'], $gokartCount);
        
                foreach($competition as $ride)
                    for($przejazdI = 1; $przejazdI < $gokartCount; $przejazdI++)
                        foreach($ride[$przejazdI] as $index=>$competitor)
                            $model->add('tm_przejazd', ['tm_zawodnik_id' => $competitor, 'status_przejazdu_id' => 3, 'gokart_id' => $gokartsArray[$przejazdI]]);
                
                $model->updateRide($model->getfirstid('tm_przejazd')[0]->tm_przejazd_id);
                return redirect()->to( base_url().'/main/mod' ); 
            }
            else
            {
                $_SESSION['validation'] = $this->validator->listErrors(); 

                switch(count($_POST['gokartSelected']) == 1)
                {
                    case true:
                        $_SESSION['validation'] .= "<ul><li>Nie wybrano gokarty.</li></ul>";
                        break;
                }
                return redirect()->to( base_url().'/main/mod' ); 
            }
        }
    }
}