<div>
<?php switch($modificationForms):
case 0: ?>
    <!-- Dodawanie/Planowanie Zawodów -->
    <div class="row m-3" id="competition_form">
        <div class="col"><h2>Dodawanie/Planowanie Zawodów</h2>
            <form action="/main/compmod/add" method="POST">
                <label for="competition_name"><h4>Nazwa</h4></label>
                <input id="competition_name" name="competition_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwa">
                <label for="competition_start_date"><h4>Data Rozpoczęcia</h4></label>
                <input id="competition_start_date" name="competition_start_date" class="form-control form-control-lg mb-4 w-50" type="date" >
                <input type="submit" value="Zaplanuj" class="btn btn-success" /><hr>
                <p>
                    Tworzy nowe zawody.<br>
                    Zostaje włączony dostęp do rejestracji zawodników.
                </p>
            </form>
        </div>
    </div>
<?php break; ?>
<?php case 1: ?>
    <!-- Rozpoczynanie Zawodów -->
    <div class="row m-3" id="school_form">
        <div class="col">
            <?php if($comp_countActiveCompetition == 1) : ?>
                <h2>Nie można zacząć zawodów, kiedy inne są w trakcie.</h2></div></div>
            <?php break; ?>
            <?php endif; ?>
            <?php if($comp_countScheduledCompetition == 0) : ?>
                <h2>Brak zawodów do rozpoczęcia.</h2></div></div>
            <?php break; ?>
            <?php endif;?>
<form action="/main/compmod/begin" method="POST">
    <label for="competition_name"><h4>Wybierz zawody do rozpoczęcia</h4></label><br>
    <select id="competition_name" name="competition_id" class="custom-select custom-select-lg mb-4 w-50">
        <?php foreach($comp_chosencompetitiondata as $innerrow) :?>
            <option <?php if($innerrow->zawody_id==$comp_chosencompetitiondata[0]->zawody_id){echo("selected");}?> value="<?= $innerrow->zawody_id?>"> <?= $innerrow->nazwa ?> </option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" value="Zacznij" class="btn btn-success"/><hr>
    <p>
        Zmienia status zawodów z "ZAPLANOWANE" na "W TRAKCIE".
        <br> Zostają włączony dostęp do losowania przejazdów.
        <br> Zostaje włączony dostęp do strony sędziego.
    </p>
</form>
</div>
</div>
<?php break; ?>
<?php case 2: ?>
    <!-- Losowanie Przejazdów -->
    <div class="row m-3" id="school_form">
    <div class="col">
    <?php if($comp_countActiveCompetition == 0) : ?>
        <h2>Nie ma żadnych zawodów w trakcie, do których można wylosować przejazdy.</h2></div></div>
        <?php break;?>
    <?php endif; ?>
    <?php if($comp_countCompetitor > 0) : ?>
        <h2>Przejazdy zostały wylosowane.</h2></div></div>
        <?php break;?>
    <?php endif; ?>
    <form action="/main/compmod/random" method="POST">
        <label for="competition_name"><h4>Zawody</h4></label><br>
        <input id="competition_name" name="competition_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwa" value="<?= $comp_chosenactivecompetition[0]->nazwa ?>" disabled>
        <label for="ride_amount"><h4>Limit przejazdów jednym gokartem naraz.</h4></label>
        <input id="ride_amount" name="ride_amount" class="form-control form-control-lg mb-4 w-50" type="number" min="0" placeholder="Co ile będzie wymieniony gokart.">
        <label for="gokart_checkbox"><h4>Gokarty:</h4></label>
        <input type="hidden" value="a" name="gokartSelected[]">;
        <?php foreach($gokartdata as $row) : ?>
            <div class="custom-control custom-checkbox" name="<?= $row->nazwa ?>">
                <input type="checkbox" name="gokartSelected[]" class="custom-control-input" value="<?= $row->gokart_id ?>" id="<?= $row->nazwa ?>">
                <label class="custom-control-label" for="<?= $row->nazwa ?>"><?= $row->nazwa ?></label><br>
            </div><br>
        <?php endforeach; ?>
        <input type="submit" value="Wylosuj" class="btn btn-success"/><hr>
        <p>
            Zostają wylosowane przejazdy dla zawodników.<br>
            Zostaje włączony dostęp do strony sędziego.
        </p>
    </form>
    </div>
    </div>
<?php break; ?>
<?php case 3: ?>
    <!-- Kończenie Zawodów -->
    <div class="row m-3" id="school_form">
    <div class="col">
    <?php if($comp_countActiveCompetition == 0) : ?>
        <h2>Nie ma żadnych zawodów, które można zakończyć.</h2></div></div>
        <?php break; ?>
    <?php endif; ?>
    <form action="/main/compmod/finish" method="POST">
        <label for="competition_name"><h4>Nazwa Aktywnych Zawodów</h4></label>
        <input id="competition_name" name="competition_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwa" value="<?= $comp_chosenactivecompetition[0]->nazwa ?>" disabled>
        <input type="hidden" name="competition_id" value="<?= $comp_chosenactivecompetition[0]->zawody_id ?>">
        <input type="submit" value="Zakończ" class="btn btn-info"/><hr>
        <p>
            Zmienia status zawodów z "W TRAKCIE" na "ZAKOŃCZONE".
            <br> Zawody zostają dodane do archiwum.
        </p>
    </form>
    </div>
    </div>
<?php break; ?>
<?php case 4: ?>
    <!-- Modyfikacja Zawodów -->
    <div class="row m-3" id="school_form">
    <div class="col">
        <?php if(!isset($chosencompetitiondata[0]->zawody_id)) :?>
            <h2>Brak dodanych zawodów</h2></div></div>
            <?php break; ?>
        <?php endif;?>
        <h2>Wybierz Zawody</h2>
        <form action="/main/mod/modcompetition" method="POST">
            <select id="competition_picker" name="competition_picker"class=" select_location custom-select custom-select-lg mb-4 w-50">
            <?php if(count($chosencompetitiondata)!=0):?>
                <?php foreach($competitiondata as $innerrow) :?>
                    <option <?php if($innerrow->zawody_id==$chosencompetitiondata[0]->zawody_id){echo("selected");}?> id="<?= $innerrow->zawody_id?>" value="<?= $innerrow->zawody_id?>"> <?= $innerrow->nazwa?> </option>
                <?php endforeach; ?>
            <?php endif;?>
            </select>
            <hr>
            <?php foreach($chosencompetitiondata as $row) :?>
                <label for="competition_name"><h4>Nazwa</h4></label>
                <input id="competition_name" class="form-control form-control-lg mb-4 w-50" type="text" name="competition_name" value="<?= $row->nazwa?>">
                <label for="competition_start_date"><h4>Data Rozpoczęcia</h4></label>
                <input id="competition_start_date" class="form-control form-control-lg mb-4 w-50" type="date" name="competition_start_date" value="<?= $row->data_rozpoczecia?>">
                <label for="competition_end_date"><h4>Data Zakończenia</h4></label>
                <input id="competition_end_date" class="form-control form-control-lg mb-4 w-50" type="date" name="competition_end_date" value="<?= $row->data_zakonczenia?>">
            <?php endforeach;?>
            <input type="submit" name="Update" value="Zatwierdź" class="btn btn-success" />
            <?php if(count($comp_checkCompetitionStatus) > 0) : ?>
                <input type="submit" name="Delete" value="Usuń" class="btn btn-danger" />
            <?php endif; ?>
        </form>
    </div>
    </div>
<?php break; ?>
<?php case 5: ?>
    <!-- Dodawanie Szkoły -->
    <div class="row m-3" id="school_form">
        <div class="col"><h2>Dodawanie Szkoły</h2>
            <form action="/main/add/school" method="POST">
                <label for="school_name"><h4>Nazwa</h4></label>
                <input id="school_name" name="school_name" class="form-control form-control-lg w-50" type="text" placeholder="Nazwa">
                <label for="school_town"><h4>Miasto</h4></label><br>
                <select id="school_town" name="school_town" class="custom-select custom-select-lg mb-1 w-50">
                    <?php foreach($citydata as $innerrow) :?>
                        <option value="<?= $innerrow->miasto_id?>"> <?= $innerrow->nazwa ?> </option>
                    <?php endforeach; ?>
                </select><br>
                <label for="school_acronym"><h4>Akronim</h4></label>
                <input id="school_acronym" name="school_acronym" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Akronim">
                <input type="submit" value="Dodaj" class="btn btn-success" />
            </form>
        </div>
    </div>
<?php break; ?>
<?php case 6: ?>
    <!-- Dodawanie Miasta-->
    <div class="row m-3" id="town_form">
        <div class="col"><h2>Dodawanie Miasta</h2>
            <form action="/main/add/town" method="POST">
                <label for="town_name"><h4>Nazwa</h4></label>
                <input id="town_name" name="town_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwa">
                <input type="submit" value="Dodaj" class="btn btn-success" />
            </form>
        </div>
    </div>
<?php break; ?>
<?php case 7: ?>
    <!-- Dodawanie Gokarta -->
    <div class="row m-3" id="gokart_form">
        <div class="col"><h2>Dodawanie Gokarta</h2>
            <form action="/main/add/gokart" method="POST">
                <label for="gokart_name"><h4>Nazwa</h4></label>
                <input id="gokart_name" name="gokart_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwa">
                <input type="submit" value="Dodaj" class="btn btn-success" />
            </form>
        </div>
    </div>
<?php break; ?>
<?php case 8: ?>
    <!-- Modyfikacja Zawodników -->
    <div class="row m-3" id="competitor_form">
    <div class="col">
        <?php if(!isset($chosencompetitordata[0]->tm_zawodnik_id)):?>
            <h2>Brak dodanych zawodników</h2></div></div>
            <?php break; ?>
        <?php endif;?> 
        <h2>Wybierz zawodnika</h2>  
        <form action="/main/mod/modcomp" method="POST">       
            <select value="Wybierz" id="competitor_picker"  name="competitor_picker" class=" select_location custom-select custom-select-lg mb-4 w-50" onchange="">
                <?php foreach($competitordata as $row) :?>
                    <option <?php if($row->tm_zawodnik_id==$chosencompetitordata[0]->tm_zawodnik_id){echo("selected");}  ?> value="<?= $row->tm_zawodnik_id?>" id="<?= $row->tm_zawodnik_id?>"><?= $row->imie?> <?= $row->nazwisko?> </option>
                <?php endforeach; ?>
            </select>
            <hr>   
            <?php foreach($chosencompetitordata as $row) :?>
                <label for="competitor_name"><h4>Imie</h4></label>
                <input id="competitor_name" name="competitor_name" class="form-control form-control-lg mb-4 w-50" type="text" value="<?= $row->imie ?>">
                <label for="competitor_surname"><h4>Nazwisko</h4></label>
                <input id="competitor_surname" name="competitor_surname" class="form-control form-control-lg mb-4 w-50" type="text" value="<?= $row->nazwisko ?>">
                <label for="competitor_date"><h4>Data Urodzenia</h4></label>
                <input id="competitor_date" name="competitor_date" class="form-control form-control-lg mb-4 w-50" type="date" value="<?= $row->data_urodzenia?>" >
                <label for="competitor_school"><h4>Szkoła</h4></label><br>
                <select id="competitor_school" name="competitor_school" class="custom-select custom-select-lg mb-4 w-50">
                    <?php foreach($schooldata as $innerrow) :?>
                        <option  value="<?= $innerrow->szkola_id?>" <?php if($innerrow->szkola_id==$row->szkola_id){echo("selected");}?>> <?= $innerrow->nazwa?> </option>
                    <?php endforeach; ?>
                </select><br>
                <label for="competitor_competition"><h4>Zawody</h4></label><br>
                <select id="competitor_competition" name="competitor_competition" class="custom-select custom-select-lg mb-4 w-50">
                    <?php foreach($competitiondata as $innerrow) :?>
                        <option <?php if($innerrow->zawody_id==$chosencompetitordata[0]->zawody_id){echo("selected");}?> value="<?= $innerrow->zawody_id?>"> <?= $innerrow->nazwa?> </option>
                    <?php endforeach; ?>
                </select><br>
                <input type="submit" name="Update" value="Zatwierdź" class="btn btn-success"/>
                <?php if(count($comp_checkCompetitorStatus) > 0) : ?>
                    <input type="submit" name="Delete" value="Usuń" class="btn btn-danger" />
                <?php endif; ?>
            <?php endforeach; ?>
        </form>
    </div>
</div>
</div>
<?php break; ?>
<?php case 9: ?>
    <!-- Modyfikacja Przejazdów -->
    <div class="row m-3" id="competitor_form">
    <div class="col">
    <?php if(count($chosenridedata)==0):?>
        <h2>Brak dodanych przejazdów</h2></div></div>
        <?php break; ?>
    <?php endif;?>
    <h2>Wybierz przejazd</h2>
    <form action="/main/mod/modride" method="POST">
        <select id="ride_picker" name="ride_picker" class=" select_location custom-select custom-select-lg mb-4 w-50">
            <?php foreach($ridedata as $row) :?>
                <option <?php if($row->tm_przejazd_id==$chosenridedata[0]->tm_przejazd_id){echo("selected");} ?> value="<?= $row->tm_przejazd_id?>" id="<?= $row->tm_przejazd_id?>"><?= $row->imie?> <?= $row->nazwisko?> (<?= $row->nazwa?>) </option>
            <?php endforeach; ?>
        </select>
        <hr>
        <?php foreach($chosenridedata as $row) :?>
            <?php
            $time=$row->czas;
            (string)$minutes=floor($time/60000);
            $time-=$minutes*60000;
            (string)$seconds=floor($time/1000);
            $time-=$seconds*1000;
            (string)$miliseconds=$time;
            ?>
            <label for="ride_competitor"><h4>Imie Nazwisko</h4></label>
            <input id="ride_competitor" class="form-control form-control-lg mb-4 w-50" type="text" value="<?= $row->imie?> <?=$row->nazwisko?>" disabled>
            <label for="ride_gokart"><h4>Gokart</h4></label><br>
            <select id="ride_gokart" name="ride_gokart" class="custom-select custom-select-lg mb-4 w-50">
                <?php foreach($gokartdata as $innerrow) :?>
                    <option <?php if($innerrow->gokart_id==$chosenridedata[0]->gokart_id){echo("selected");}?> value="<?= $innerrow->gokart_id?>" id="<?= $row->gokart_id?>"> <?= $innerrow->nazwa?> </option>
                <?php endforeach; ?>
            </select><br>
            <label for="ride_time"><h4>Czas</h4></label>
            <div id="ride_time" class="w-50">
                <input id="ride_time_minutes" name="minutes" class="form-control form-control-lg mb-4 w-25 float-left" type="number" maxlength="2" placeholder="M" value="<?= $minutes ?>"><h4 class="float-left mt-2">:</h4>
                <input id="ride_time_seconds" name="seconds"  class="form-control form-control-lg mb-4 w-25 float-left" type="number" maxlength="2" placeholder="S" value="<?= $seconds ?>"><h4 class="float-left mt-3">.</h4>
                <input id="ride_time_milliseconds" name="miliseconds" class="form-control form-control-lg mb-4 w-25" type="number" maxlength="3" placeholder="MS" value="<?= $miliseconds ?>">
            </div>
            <input type="submit" value="Zatwierdź" class="btn btn-success"/>
        <?php endforeach; ?>
    </form>
    </div>
    </div>
<?php break; ?>
<?php case 10: ?>
    <!-- Modyfikacja Szkoły -->
    <div class="row m-3" id="school_form">
    <div class="col">
    <?php if(!isset($chosenschooldata[0]->szkola_id)):?>
        <h2>Brak dodanych szkół</h2></div></div>
        <?php break; ?>
    <?php endif;?>
    <h2>Wybierz Szkołe</h2>
    <form action="/main/mod/modschool" method="POST">
        <select id="school_picker"  name="school_picker" class="  select_location custom-select custom-select-lg mb-4 w-50">
            <?php foreach($schooldata as $row) :?>
                <option <?php if($row->szkola_id==$chosenschooldata[0]->szkola_id){echo("selected");}  ?> value="<?= $row->nazwa?>" id="<?= $row->szkola_id?>" ><?= $row->nazwa?> </option>
            <?php endforeach;?>
        </select>
        <hr>
        <?php foreach($chosenschooldata as $row) :?>
            <label for="school_name"><h4>Nazwa</h4></label>
            <input id="school_name" name="school_name" class="form-control form-control-lg mb-4 w-50" type="text" value="<?= $row->nazwa ?>">
            <label for="school_town"><h4>Miasto</h4></label><br>
            <select id="school_town" name="school_town" class="custom-select custom-select-lg mb-4 w-50">
                <?php foreach($citydata as $innerrow) :?>
                    <option <?php if($innerrow->miasto_id==$chosenschooldata[0]->miasto_id){echo("selected");}?> value="<?= $innerrow->miasto_id?>"> <?= $innerrow->nazwa ?> </option>
                <?php endforeach; ?>
            </select><br>
            <label for="school_acronym"><h4>Akronim</h4></label>
            <input id="school_acronym" name="school_acronym" class="form-control form-control-lg mb-4 w-50" type="text" value="<?= $row->akronim ?>">
            <input type="submit" value="ZATWIERDŹ" class="btn btn-success" />
        <?php endforeach;?>
    </form>
    </div>
    </div>
<?php break; ?>
<?php case 11: ?>
    <!-- Modyfikacja Gokarta -->
    <div class="row m-3" id="gokart_form">
    <div class="col">
    <?php if(!isset($chosengokartdata[0]->gokart_id)):?>
        <h2>Brak dodanych gokartów</h2></div></div>
        <?php break; ?>
    <?php endif;?>
    <h2>Wybierz Gokart</h2>
    <form action="/main/mod/modgokart" method="POST">
        <select id="gokart_picker" name="gokart_picker"class=" select_location custom-select custom-select-lg mb-4 w-50">
            <?php foreach($gokartdata as $row) :?>
                <option <?php if($row->gokart_id==$chosengokartdata[0]->gokart_id){echo("selected");}  ?> value="<?= $row->nazwa?>" id="<?= $row->gokart_id?>" ><?= $row->nazwa?> </option>
            <?php endforeach; ?>
        </select>
        <hr>
        <?php foreach($chosengokartdata as $row) :?>
            <label for="gokart_name"><h4>Nazwa</h4></label>
            <input id="gokart_name" name="gokart_name" class="form-control form-control-lg mb-4 w-50" type="text" value="<?= $row->nazwa ?>">
            <input type="submit" value="Zatwierdź" class="btn btn-success" />
        <?php endforeach; ?>
    </form>
    </div>
    </div>
<?php break; ?>
<?php case 12: ?>
    <!-- Modyfikacja Miasta -->
    <div class="row m-3" id="city_form">
    <div class="col">
    <?php if(!isset($chosencitydata[0]->miasto_id)):?>
        <h2>Brak dodanych miast</h2></div></div>
        <?php break; ?>
    <?php endif;?>
    <h2>Wybierz miasto</h2>
    <form action="/main/mod/modcity" method="POST">
        <select id="city_picker" name="city_picker" class="select_location custom-select custom-select-lg mb-4 w-50">
            <?php foreach($citydata as $innerrow) :?>
                <option <?php if($innerrow->miasto_id==$chosencitydata[0]->miasto_id){echo("selected");}  ?> value="<?= $innerrow->miasto_id?>" id="<?= $innerrow->miasto_id?>" > <?= $innerrow->nazwa ?> </option>
            <?php endforeach; ?>
        </select><hr>
        <?php foreach($chosencitydata as $row) :?>
            <label for="city_name"><h4>Nazwa</h4></label>
            <input id="city_name" name="city_name" class="form-control form-control-lg w-50 mb-4" type="text" value="<?= $row->nazwa?>">
            <input type="submit" value="Zatwierdź" class="btn btn-success" />
        <?php endforeach;?>
    </form>
    </div>
    </div>
<?php break; ?>
<?php endswitch; ?>

</div>
