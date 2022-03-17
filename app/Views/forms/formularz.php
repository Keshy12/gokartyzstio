<div>
<?php switch($formularz): 
case 0: ?>
    <div class="row m-3" id="competitor_form">
        <div class="col"><h2>Wybierz zawodnika</h2>
            <select id="competitor_picker" class="custom-select custom-select-lg mb-4 w-50">
                <option value="0">Imie Nazwisko 1(Z BAZY)</option>
            </select>
            <hr>
            <form action="*" method="POST">
                <label for="competitor_name"><h4>Imie</h4></label>
                <input id="competitor_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Imie">
                <label for="competitor_surname"><h4>Nazwisko</h4></label>
                <input id="competitor_surname" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwisko">
                <label for="competitor_date"><h4>Data Urodzenia</h4></label>
                <input id="competitor_date" class="form-control form-control-lg mb-4 w-50" type="date" >
                <label for="competitor_school"><h4>Szkoła</h4></label><br>
                <select id="competitor_school" class="custom-select custom-select-lg mb-4 w-50">
                    <option value="0">ZSTIO (Z BAZY)</option>
                    <option value="1">Kraków</option>
                </select><br>
                <input type="submit" value="USUŃ" class="btn btn-danger" />
                <input type="submit" value="ZATWIERDŹ" class="btn btn-secondary" />
            </form>
        </div>
    </div>
<?php break; ?>
<?php case 1: ?>
        <div class="row m-3" id="ride_form">
        <div class="col"><h2>Wybierz przejazd</h2>
            <select id="ride_picker" class="custom-select custom-select-lg mb-4 w-50">
                <option value="0">Imie Nazwisko Gokart(Z BAZY)</option>
            </select>
            <hr>
            <form action="*" method="POST">
                <label for="ride_competitor"><h4>Imie Nazwisko</h4></label>
                <input id="ride_competitor" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Imie Nazwisko" disabled>
                <label for="ride_status"><h4>Status Przejazdu</h4></label><br>
                <select id="ride_status" class="custom-select custom-select-lg mb-4 w-50">
                    <option value="0">Jechał (Z BAZY)</option>
                </select><br>
                <label for="ride_gokart"><h4>Gokart</h4></label><br>
                <select id="ride_gokart" class="custom-select custom-select-lg mb-4 w-50">
                    <option value="0">Czarowny ładny(Z BAZY)</option>
                </select><br>
                <label for="ride_time"><h4>Czas</h4></label>
                <div id="ride_time" class="w-50">
                    <input id="ride_time_minutes" class="form-control form-control-lg mb-4 w-25 float-left" type="number" maxlength="2" placeholder="M"><h4 class="float-left mt-2">:</h4>
                    <input id="ride_time_seconds" class="form-control form-control-lg mb-4 w-25 float-left" type="number" maxlength="2" placeholder="S"><h4 class="float-left mt-3">.</h4>
                    <input id="ride_time_milliseconds" class="form-control form-control-lg mb-4 w-25" type="number" maxlength="3" placeholder="MS">
                </div>
                <input type="submit" value="USUŃ" class="btn btn-danger" />
                <input type="submit" value="ZATWIERDŹ" class="btn btn-secondary" />
            </form>
        </div>
    </div>
<?php break; ?>
<?php case 2: ?>
<div class="row m-3" id="school_form">
    <div class="col"><h2>Wybierz Szkołe</h2>
        <select id="school_picker" class="custom-select custom-select-lg mb-4 w-50">
            <option value="0">Akronim Szkoły(Z BAZY)</option>
        </select>
        <hr>
        <form action="*" method="POST">
            <label for="school_name"><h4>Nazwa</h4></label>
            <input id="school_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwa">
            <label for="school_town"><h4>Miasto</h4></label><br>
            <select id="school_town" class="custom-select custom-select-lg mb-4 w-50">
                <option value="0">Limanowa (Z BAZY)</option>
            </select><br>
            <label for="school_acronym"><h4>Akronim</h4></label>
            <input id="school_acronym" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Akronim">
            <input type="submit" value="USUŃ" class="btn btn-danger" />
            <input type="submit" value="ZATWIERDŹ" class="btn btn-secondary" />
        </form>
    </div>
</div>
<?php break; ?>
<?php case 3: ?>
    <div class="row m-3" id="gokart_form">
       <div class="col"><h2>Wybierz Gokart</h2>
           <select id="gokart_picker" class="custom-select custom-select-lg mb-4 w-50">
               <option value="0">Pomarańczowy Gokart(Z BAZY)</option>
           </select>
           <hr>
           <form action="*" method="POST">
               <label for="gokart_name"><h4>Nazwa</h4></label>
               <input id="gokart_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwa">

               <input type="submit" value="USUŃ" class="btn btn-danger" />
               <input type="submit" value="ZATWIERDŹ" class="btn btn-secondary" />
           </form>
       </div>
   </div>
<?php break; ?>
<?php case 4: ?>
    <div class="row m-3" id="school_form">
       <div class="col"><h2>Dodawanie Szkoły</h2>
           <form action="*" method="POST">
               <label for="school_name"><h4>Nazwa</h4></label>
               <input id="school_name" class="form-control form-control-lg w-50" type="text" placeholder="Nazwa">
               <label for="school_town"><h4>Miasto</h4></label><br>
               <select id="school_town" class="custom-select custom-select-lg mb-1 w-50">
                   <option value="0">Limanowa (Z BAZY)</option>
               </select><br>
               <input type="submit" value="DODAJ MIASTO" class="btn btn-outline-secondary mb-4" /><br>
               <label for="school_acronym"><h4>Akronim</h4></label>
               <input id="school_acronym" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Akronim">
               <input type="submit" value="DODAJ" class="btn btn-secondary" />
           </form>
       </div>
   </div>
<?php break; ?>
<?php case 5: ?>
    <div class="row m-3" id="town_form">
        <div class="col"><h2>Dodawanie Miasta</h2>
            <form action="*" method="POST">
                <label for="town_name"><h4>Nazwa</h4></label>
                <input id="town_name" class="form-control form-control-lg w-50 mb-4" type="text" placeholder="Nazwa">
                <input type="submit" value="DODAJ" class="btn btn-secondary" />
            </form>
        </div>
    </div>
<?php break; ?>
<?php case 6: ?>
    <div class="row m-3" id="competition_form">
        <div class="col"><h2>Dodawanie/Planowanie Zawodów</h2>
            <form action="*" method="POST">
                <label for="competition_name"><h4>Nazwa</h4></label>
                <input id="competition_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwa">
                <label for="competition_start_date"><h4>Data Rozpoczęcia</h4></label>
                <input id="competition_start_date" class="form-control form-control-lg mb-4 w-50" type="date" >
                <input type="submit" value="ZAPLANUJ" class="btn btn-secondary" />
            </form>
        </div>
    </div>
    <?php break; ?>
<?php case 7: ?>
    <div class="row m-3" id="school_form">
        <div class="col">
            <form action="*" method="POST">
                <label for="competition_name"><h4>Wybierz zawody do rozpoczęcia</h4></label><br>
                <select id="competition_name" class="custom-select custom-select-lg mb-1 w-50">
                    <option value="0">Nazwa Zawodów (Z statusem zaplanowane) (Z BAZY)</option>
                </select><br>
                <input type="submit" value="Zacznij" class="btn btn-secondary"/>
            </form>
            <!-- DO usunięcia -->
            <hr>
            <p>Komentarz: ZMIENIA STATUS ZAWODÓW Z "ZAPLANOWANE" NA "W TRAKCIE"<br>
                Jeśli już są jakieś zawody w trakcie nie wyświetlać formularza tylko tekst poniżej:</p>
            <!--  -->
            <h2>Nie można zacząć zawodów kiedy inne są w trakcie.</h2>
        </div>
    </div>
<?php break; ?>
<?php case 8: ?>
    <div class="row m-3" id="school_form">
        <div class="col">
            <form action="*" method="POST">
                <label for="competition_name"><h4>Wybierz zawody do zakończenia</h4></label><br>
                <select id="competition_name" class="custom-select custom-select-lg mb-1 w-50">
                    <option value="0">Nazwa Zawodów (Z statusem w trakcie) (Z BAZY)</option>
                </select><br>
                <input type="submit" value="Zakończ" class="btn btn-secondary"/>
            </form>
            <!-- DO usunięcia -->
            <hr>
            <p>Komentarz: ZMIENIA STATUS ZAWODÓW Z "W TRAKCIE" NA "Zakończone"<br>
                Jeśli nie ma zawodów w trakcie wyświetlaj tylko tekst poniżej:</p>
            <!--  -->
            <h2>Nie ma żadnych zawodów które można zakończyć.</h2>
        </div>
    </div>
<?php break; ?>
<?php case 9: ?>
    <div class="row m-3" id="school_form">
        <div class="col"><h2>Wybierz Zawody</h2>
            <select id="competition_picker" class="custom-select custom-select-lg mb-4 w-50">
                <option value="0">Nazwa Zawodów(Z BAZY)</option>
            </select>
            <hr>
            <form action="*" method="POST">
                <label for="competition_name"><h4>Nazwa</h4></label>
                <input id="competition_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwa">
                <label for="competition_start_date"><h4>Data Rozpoczęcia</h4></label>
                <input id="competition_start_date" class="form-control form-control-lg mb-4 w-50" type="date" >
                <label for="competition_end_date"><h4>Data Zakończenia</h4></label>
                <input id="competition_end_date" class="form-control form-control-lg mb-4 w-50" type="date" >
                <input type="submit" value="USUŃ" class="btn btn-danger" />
                <input type="submit" value="ZATWIERDŹ" class="btn btn-secondary" />
            </form>
        </div>
    </div>
<?php break; ?>
<?php endswitch; ?>
</div>







