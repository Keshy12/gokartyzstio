<?php

namespace App\Controllers;
use App\Models\ModificationModel;

class ModificationController extends BaseController
{
    public function index()
    {
        if(!isset($_SESSION["zalogowany"]))
        {
            $_SESSION["zalogowany"] = "";
        };
        $data = [
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

        $_COOKIE['ride'] = (isset($model->getfirstid('tm_przejazd')[0]->tm_przejazd_id)) ? $model->getfirstid('tm_przejazd')[0]->tm_przejazd_id : 0;

        $_COOKIE['competitor'] = (isset($model->getfirstid('tm_zawodnik')[0]->tm_zawodnik_id)) ? $model->getfirstid('tm_zawodnik')[0]->tm_zawodnik_id : 0;
        
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
        $data['chosencompetitordata']=$model->getchosen('tm_zawodnik', 'tm_zawodnik_id', (int)$_COOKIE['competitor']);
        $data['chosencompetitiondata']=$model->getchosen('zawody', 'zawody_id', (int)$_COOKIE['competition']);

        $data['comp_chosencompetitiondata']=$model->getchosen('zawody', 'status_zawodow_id', '1');
        $data['comp_numberOfRows']=$model->getNumberOfRows('zawody', 'status_zawodow_id', '2')[0]->numberOfRows;
        $data['comp_chosenactivecompetition']=$model->getchosen('zawody', 'status_zawodow_id', '2');        
    
        return view('modification',$data);   
    }

    public function modifycompetitor()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ModificationModel($db);
        $model->modifycompetitor($_POST['competitor_picker'],$_POST['competitor_name'],$_POST['competitor_surname'],$_POST['competitor_date'],$_POST['competitor_school'],$_POST['competitor_competition']);
        
        return redirect()->to( base_url().'/main/mod' );
    }

    public function modifyride()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ModificationModel($db);
        $time=(int)$_POST['minutes']*60000+(int)$_POST['seconds']*1000+(int)$_POST['miliseconds'];
        $model->modifyride($_POST['ride_picker'],$_POST['ride_gokart'],$time);
        
        return redirect()->to( base_url().'/main/mod' );
    }

    public function modifyschool()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ModificationModel($db);
        $model->modifyschool($_POST['school_picker'],$_POST['school_name'],$_POST['school_town'],$_POST['school_acronym']);
        
        return redirect()->to( base_url().'/main/mod' );
    }

    public function modifygokart()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ModificationModel($db);
        $model->modifygokart($_POST['gokart_picker'],$_POST['gokart_name']);
        
        return redirect()->to( base_url().'/main/mod' );
        
    }

    public function modifycompetition()
    {
        if(!($_SESSION["zalogowany"] == "pełny"))
            return redirect()->to( base_url().'/main');

        $db = db_connect();
        $model = new ModificationModel($db);
        $model->modifycompetition($_POST['competition_picker'],$_POST['competition_name'],$_POST['competition_start_date'],$_POST['competition_end_date']);
        
        return redirect()->to( base_url().'/main/mod' );
        
    }
}