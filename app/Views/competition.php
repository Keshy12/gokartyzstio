<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
    <meta http-equiv="refresh" content="12">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col">
                <h2>Aktualne Przejazdy</h2>
                <?php foreach($result as $row) : ?>
                    <?php 
                        switch($row->status_przejazdu_id)
                        {
                            case 1:
                                ?>
                                <?php if(is_null($row->czas)) : ?>
                                    <div class="card mb-2" style="border: 3px solid red; background-color: rgba(0,0,0,0)">
                                        <div class="card-body">
                                            <h4 class="mt-2"><b><?= $row->imie ?> <?= $row->nazwisko ?></b> <?= $row->nazwa ?> <r class="float-right">DYSKWALIFIKACJA</r></h4>
                                <?php else : ?>
                                    <div class="card mb-2" style="border: 3px solid deepskyblue; background-color: rgba(0,0,0,0)">
                                        <div class="card-body">
                                            <h4 class="mt-2"><b><?= $row->imie ?> <?= $row->nazwisko ?></b> <?= $row->nazwa ?> <r class="float-right">Czas: <?= $row->czas ?></r></h4>
                                <?php endif; ?>
                                <?php
                                break;
                            case 2:
                                ?>
                                <div class="card mb-2" style="border: 3px solid limegreen; background-color: rgba(0,0,0,0)">
                                    <div class="card-body">
                                        <h4 class="mt-2"><b><?= $row->imie ?> <?= $row->nazwisko ?></b> <?= $row->nazwa ?><r class="float-right"></r></h4>
                                <?php
                                break;
                            case 3:
                                ?>
                                <div class="card mb-2" style="border: 3px solid grey; background-color: rgba(0,0,0,0)">
                                    <div class="card-body">
                                        <h4 class="mt-2"><b><?= $row->imie ?> <?= $row->nazwisko ?></b> <?= $row->nazwa ?></h4>
                                <?php
                                break;
                        }           
                    ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col">
                <h2>Tablica Wyników <a href="/main/score"><button type="button" class="btn btn-outline-dark float-right" data-mdb-ripple-color="dark">Wszystkie Wyniki</button></a></h2>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table text-center">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">🏆</th>
                                <th scope="col">Imię</th>
                                <th scope="col">Nazwisko</th>
                                <th scope="col">Szkoła</th>
                                <th scope="col">Czas</th>
                                <th scope="col">Gokart</th>
                            </tr>
                            </thead>
                            <tbody class="font-weight-bold">
                            <!-- ELEMENT -->
                            <?php foreach($resultleaderboard as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i; $i++ ?></th>
                                <td><?= $row->imie ?></td>
                                <td><?= $row->nazwisko ?></td>
                                <td><?= $row->akronim ?></td>
                                <?php if(is_null($row->czas)) : ?>
                                    <td class="text-danger">DSQ</td>
                                <?php else : ?>
                                    <td><?= $row->czas ?></td>
                                <?php endif; ?>
                                <td><?= $row->nazwa ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <!-- ELEMENT KONIEC -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>