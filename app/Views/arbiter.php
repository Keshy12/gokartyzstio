<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>

    <div class="container-fluid">
        <div class="row mt-3">
            <!-- PIERWSZY RZĄD -->
            <div class="col">
                <!-- ELEMENT ZWYKLY -->
                    <?php foreach($result as $row) : ?>
                        <?php 
                            switch($row->status_przejazdu_id)
                            {
                                case 2:
                                    ?>
                                    <!-- ELEMENT NAJNOWSZY -->
                                    <div class="card border-success mb-3">
                                        <div class="card-body">
                                            <h3 class="card-title"><?= $row->imie ?> <?= $row->nazwisko ?></h3>
                                            <h5>Szkoła: <?= $row->akronim ?></h5>
                                            <h5>Gokart: <?= $row->nazwa ?></h5>
                                            <button type="button" class="btn btn-outline-success float-right ml-3 w-25">Dodaj czas</button>
                                            <button data-toggle="modal" data-target=".bd-example-modal-sm" type="button" class="btn btn-outline-danger">Dyskfalifikacja</button>
                                    <?php
                                    break;
                                case 3:
                                    ?>
                                    <div class="card border-info mb-3">
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
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content p-3 border-danger">
                <h4>Potwierdzenie</h4>
                <h5>Czy napewno chcesz wykonać tę operacje?</h5>
                <button type="button" class="btn btn-outline-danger mb-1" >Tak</button>
                <button type="button" class="btn btn-outline-success" data-dismiss="modal">Nie</button>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>