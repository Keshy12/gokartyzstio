<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>

    <div class="container-fluid">
        <div class="row mt-3">
            <!-- PIERWSZY RZĄD -->
            <div class="col">
                <!-- ELEMENT NAJNOWSZY -->
                <div class="card border-success mb-3">
                    <div class="card-body">
                        <h3 class="card-title">Imie Nazwisko</h3>
                        <h5>Szkoła: ZSTIO Limanowa</h5>
                        <h5>Gokart: Podstawowy czerowy</h5>
                        <button type="button" class="btn btn-outline-success float-right ml-3 w-25">Dodaj czas</button>
                        <button data-toggle="modal" data-target=".bd-example-modal-sm" type="button" class="btn btn-outline-danger">Dyskfalifikacja</button>
                    </div>
                </div>
                <!-- ELEMENT ZWYKLY -->
                <div class="card border mb-3">
                    <div class="card-body">
                        <h3 class="card-title">Imie Nazwisko</h3>
                        <h5>Szkoła: ZSTIO Limanowa</h5>
                        <h5>Gokart: Podstawowy czerowy</h5>
                    </div>
                </div>
                <div class="card border mb-3">
                    <div class="card-body">
                        <h3 class="card-title">Imie Nazwisko</h3>
                        <h5>Szkoła: ZSTIO Limanowa</h5>
                        <h5>Gokart: Pomarańczowy Drugi</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content p-3 border-danger">
                <h4>Potwierdzenie</h4>
                <h5>Czy napewno chcesz wykonać tę operacje?</h5>
                <button type="button" class="btn btn-outline-danger mb-1">Tak</button>
                <button type="button" class="btn btn-outline-success">Nie</button>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>