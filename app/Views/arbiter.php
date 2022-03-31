<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
<?php if(isset($_SESSION['validation'])) : ?>
        <div class="text-danger">
            <?= $_SESSION['validation']?>
        </div> 
        <?php unset($_SESSION['validation']) ?>
    <?php endif; ?> 
    <div class="container-fluid">
        <div class="row mt-3">
            <!-- PIERWSZY RZĄD -->
            <div class="col">
                <!-- ELEMENT ZWYKLY -->
                <?php if(count($result) <= 0) : ?>
                    <h2>Przejazdy zakończone</h2>
                <?php endif; ?>
                <?php foreach($result as $row) : ?>
                    <?php 
                        switch($row->status_przejazdu_id)
                        {
                            case 2:
                                ?>
                                <!-- ELEMENT NAJNOWSZY -->
                                <div class="card mb-3" style="border: 3px solid green; background-color: rgba(0,0,0,0)">
                                    <div class="card-body">
                                        <h3 class="card-title"><?= $row->imie ?> <?= $row->nazwisko ?></h3>
                                        <h5>Szkoła: <?= $row->akronim ?></h5>
                                        <h5>Gokart: <?= $row->nazwa ?></h5>
                                        <button data-toggle="modal" data-target=".button1" type="button" class="btn btn-success float-right ml-3 w-25">Dodaj czas</button>
                                        <button data-toggle="modal" data-target=".button2" type="button" class="btn btn-danger w-25">Dyskwalifikacja</button>
                                <?php
                                break;
                            case 3:
                                ?>
                                <div class="card mb-3" style="border: 3px solid grey; background-color: rgba(0,0,0,0)">
                                    <div class="card-body">
                                        <h3 class="card-title"><?= $row->imie ?> <?= $row->nazwisko ?></h3>
                                        <h5>Szkoła: <?= $row->akronim ?></h5>
                                        <h5>Gokart: <?= $row->nazwa ?></h5>
                                <?php
                                break;
                        }           
                    ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm button2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content p-3 border-danger">
                <h4>Potwierdzenie</h4>
                <h5>Czy na pewno chcesz wykonać tę operację?</h5>
                <a href="/main/judge/disqualify" class="btn btn-outline-danger mb-1">Tak</a>
                <button type="button" class="btn btn-outline-success" data-dismiss="modal">Nie</button>
            </div>
        </div>
    </div> 
    <div class="modal fade bd-example-modal-sm button1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content p-3 border-success">
                <label for="ride_time"><h4>Dodaj Czas</h4></label>
                <div id="ride_time" class="w-100">
                    <form action="/main/judge/addTime" method="POST" enctype="multipart/form-data">
                        <input id="ride_time_minutes" name="minutes" class="form-control form-control-lg mb-4 w-25 float-left" min="0" type="number" maxlength="2" placeholder="M">
                        <input id="ride_time_seconds" name="seconds" class="form-control form-control-lg mb-4 w-25 float-left" min="0" type="number" maxlength="2" placeholder="S">
                        <input id="ride_time_milliseconds" name="milliseconds" class="form-control form-control-lg mb-4 w-50" min="0" type="number" maxlength="3" placeholder="MS">
                        <button class="btn btn-outline-success">Zatwierdź</button>
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Anuluj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>