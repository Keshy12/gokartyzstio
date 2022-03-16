<?php

namespace App\Controllers;
use App\Models\ModificationModel;

class ModificationController extends BaseController
{
    public function index($id=1)
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
            $data['competitordata']=$model->getcompetitor();
            $data['schooldata']=$model->getschool();
            $data['gokartdata']=$model->getgokart();
            $data['statusdata']=$model->getstatus();
            $data['citydata']=$model->getcity();
            $data['chosenschooldata']=$model->getchosenschool((int)$id);
            $data['chosenridedata']=$model->getchosenride((int)$id);
            $data['chosengokartdata']=$model->getchosengokart((int)$id);

            $data['ridedata']=$model->getride();
            $data['chosencompetitordata']=$model->getchosencompetitor((int)$id);
            
            

            return view('modification',$data);
        
        }
        else
        {
            return view('gokartsMain',$data);
        }
    }

}