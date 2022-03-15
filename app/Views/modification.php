<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
<div class="container-fluid">
    <div class="row m-3">
        <div class="col"><h2>Modyfikacja</h2>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Zawodnicy</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Przejazdy</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Zawody</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Szkoły</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Gokarty</button>
        </div>
        <div class="col"><h2>Dodawanie</h2>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Zawodnicy</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Przejazdy</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Zawody</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Szkoły</button>
            <button type="button" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Gokarty</button>
        </div>
    </div>
    <hr>
    <div class="row m-3">
        <div class="col"><h2>Zawodnik</h2>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>
</div>



<?= $this->endSection() ?>