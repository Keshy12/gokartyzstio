<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>

<div class="container-fluid">
    <div class="row m-3">
        <div class="col-4"><h2>Zawody</h2>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Modyfikowanie Zawodów</button>
        </div>
        <div class="col"><h2>Dodawanie</h2>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Gokart</button>
        </div>
        <div class="col-5"><h2>Modyfikacja</h2>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Zawodnik</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Przejazd</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Gokart</button>
        </div>
    </div>
    <hr>
    Formularz Modyfikacji Zawodnika
    <div class="row m-3" id="competitor_form">
        <div class="col"><h2>Wybierz zawodnika</h2>          
            <select value="Wybierz"name="chosencompetitor" id="competitor_picker" class=" select_location custom-select custom-select-lg mb-4 w-50" onchange="">

                <?php foreach($competitordata as $row) :?>
                    <option <?php if($row->tm_zawodnik_id==$chosendata[0]->tm_zawodnik_id){echo("selected");}  ?> value="../../ModificationController/index/<?= $row->tm_zawodnik_id?>"><?= $row->imie?> <?= $row->nazwisko?> </option>
                <?php endforeach; ?>
            </select>
            <hr>
            <form action="*" method="POST">
            <?php foreach($chosendata as $row) :?>
                <label for="competitor_name"><h4>Imie</h4></label>
                <input id="competitor_name" class="form-control form-control-lg mb-4 w-50" type="text" value="<?= $row->imie ?>">
                <label for="competitor_surname"><h4>Nazwisko</h4></label>
                <input id="competitor_surname" class="form-control form-control-lg mb-4 w-50" type="text" value="<?= $row->nazwisko ?>">
                <label for="competitor_date"><h4>Data Urodzenia</h4></label>
                <input id="competitor_date" class="form-control form-control-lg mb-4 w-50" type="date" value="<?= $row->data_urodzenia?>" >
                <label for="competitor_school"><h4>Szkoła</h4></label><br>
                <select id="competitor_school" class="custom-select custom-select-lg mb-4 w-50">
                    <?php foreach($schooldata as $row) :?>
                        <option <?php if($row->szkola_id==$chosendata[0]->szkola_id){echo("selected");}?> value="<?= $row->szkola_id?>"> <?= $row->nazwa?> </option>
                    <?php endforeach; ?>
                </select><br>
                <input type="submit" value="USUŃ" class="btn btn-danger" />
                <input type="submit" value="ZATWIERDŹ" class="btn btn-secondary" />
            <?php endforeach; ?>
            </form>
        </div>
    </div>
<!-- 
     Formularz Modyfikacji Przejazdu
    <div class="row m-3" id="competitor_form">
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

    Formularz Modyfikacji Szkoły
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

    Formularz Modyfikacji Gokartów
   <div class="row m-3" id="school_form">
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

    Formularz Dodawania Szkoły
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

    Formularz Dodawania Miasta
    <div class="row m-3" id="town_form">
        <div class="col"><h2>Dodawanie Miasta</h2>
            <form action="*" method="POST">
                <label for="town_name"><h4>Nazwa</h4></label>
                <input id="town_name" class="form-control form-control-lg w-50 mb-4" type="text" placeholder="Nazwa">
                <input type="submit" value="DODAJ" class="btn btn-secondary" />
            </form>
        </div>
    </div>

     Modyfikowanie Zawodów 
    <div class="row m-3" id="town_form">
        <div class="col"><h2>Modyfikowanie Zawodów</h2>
            <form action="*" method="POST">
                <label for="town_name"><h4>Nazwa</h4></label>
                <input id="town_name" class="form-control form-control-lg w-50 mb-4" type="text" placeholder="Nazwa">
                <input type="submit" value="DODAJ" class="btn btn-secondary" />
            </form>
        </div>
    </div> -->


</div>



<?= $this->endSection() ?>