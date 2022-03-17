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
        if($_SESSION["zalogowany"] == "pełny")
        {
            $db = db_connect();
            $model = new ModificationModel($db);

            $data['competitordata']=$model->get('tm_zawodnik');
            $data['schooldata']=$model->get('szkola');
            $data['gokartdata']=$model->get('gokart');
            $data['statusdata']=$model->get('status_przejazdu');
            $data['citydata']=$model->get('miasto');
            $data['ridedata']=$model->getride();

            $data['chosenschooldata']=$model->getchosen((int)$idschool,'szkola');
            $data['chosenridedata']=$model->getchosenride((int)$idride);
            $data['chosengokartdata']=$model->getchosen((int)$idgokart,'gokart');
            $data['chosencompetitordata']=$model->getchosen((int)$idcompetitor,'tm_zawodnik');        
        
            return view('modification',$data);   
        }
        else
        {
            return view('gokartsMain',$data);
        }
    }

}