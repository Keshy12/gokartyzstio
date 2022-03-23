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

        $model->add('zawody', ['nazwa' => $_POST['competition_name'], 'data_rozpoczecia' => $_POST['competition_start_date'], 'status_zawodow_id' => 1]);
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

        $ride = $model->getWithJoin('tm_przejazd', ['tm_zawodnik', 'tm_zawodnik_id']);

        foreach($ride as $index=>$row)
        {
            $model->add('archiwum', ['imie' => $row->imie, 'nazwisko' => $row->nazwisko, 'gokart_id' => $row->gokart_id, 'czas' => $row->czas, 'szkola_id' => $row->szkola_id, 'zawody_id' => $row->zawody_id]);
            $competitor[$index] = $row->tm_zawodnik_id;
            $model->remove('tm_przejazd', $row->tm_przejazd_id);
        }
        foreach(array_unique($competitor) as $id)
            $model->remove('tm_zawodnik', $id);

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
        $gokartsArray = $_POST['gokartSelected'];
        $gokartCount = count($gokartsArray);

        $competitorsId = $model->getId();
        foreach($competitorsId as $row)
            array_push($competitorsArray, $row->tm_zawodnik_id);

        $competition = $model->ridesOrder($competitorsArray, $_POST['ride_amount'], $gokartCount);

        foreach($competition as $ride)
            for($przejazdI = 0; $przejazdI < $gokartCount; $przejazdI++)
                foreach($ride[$przejazdI] as $index=>$competitor)
                    $model->add('tm_przejazd', ['tm_zawodnik_id' => $competitor, 'status_przejazdu_id' => 3, 'gokart_id' => $gokartsArray[$przejazdI]]);
        
        $model->updateRide($model->getfirstid('tm_przejazd')[0]->tm_przejazd_id);
        return redirect()->to( base_url().'/main/mod' ); 
    }
}