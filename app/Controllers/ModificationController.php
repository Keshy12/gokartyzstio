<?php

namespace App\Controllers;
use App\Models\ModificationModel;

class ModificationController extends BaseController
{
    public function index($idcompetitor=1,$idride=1,$idschool=1,$idgokart=1)
    {
        $session = \Config\Services::session();
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

        $data['competitordata']=$model->get('tm_zawodnik');
        $data['schooldata']=$model->get('szkola');
        $data['gokartdata']=$model->get('gokart');
        $data['competitiondata']=$model->get('zawody');
        $data['statusdata']=$model->get('status_przejazdu');
        $data['citydata']=$model->get('miasto');
        $data['ridedata']=$model->getride();

        $data['chosenschooldata']=$model->getchosen((int)$idschool,'szkola');
        $data['chosenridedata']=$model->getchosenride((int)$idride);
        $data['chosengokartdata']=$model->getchosen((int)$idgokart,'gokart');
        $data['chosencompetitordata']=$model->getchosen((int)$idcompetitor,'tm_zawodnik');              
    
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
        $model->modifyride($_POST['ride_picker'],$_POST['ride_status'],$_POST['ride_gokart'],$time);
        
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
}