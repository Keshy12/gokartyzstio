<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
<div class="container-fluid">
    <div class="row m-3">
        <div class="col"><h2>Modyfikacja</h2>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Zawodnik</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Przejazd</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Zawody</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Gokart</button>
        </div>
        <div class="col"><h2>Dodawanie</h2>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Zawody</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Gokart</button>
        </div>
    </div>
    <hr>

    <!-- Formularz Modyfikacji Zawodnika
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
    </div> -->

    <!-- Formularz Modyfikacji Przejazdu
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
    </div>-->

</div>



<?= $this->endSection() ?>