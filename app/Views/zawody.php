<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col">
                <h2>Aktualne Przejazdy</h2>
                <?php foreach($result as $row) : ?>
                    <?php 
                        switch($row->status_zawodnika_id)
                        {
                            case 1:
                                ?>
                                <div class="card border-secondary mb-2">
                                    <div class="card-body">
                                        <h4 class="mt-2"><?= $row->imie ?> <?= $row->nazwisko ?> <?= $row->akronim ?> <r class="float-right">Czas: <?= $row->czas ?></r></h4>
                                <?php
                                break;
                            case 2:
                                ?>
                                <div class="card border-success mb-2">
                                    <div class="card-body">
                                        <h4 class="mt-2"><?= $row->imie ?> <?= $row->nazwisko ?> <?= $row->akronim ?></h4>
                                <?php
                                break;
                            case 3:
                                ?>
                                <div class="card border-info mb-2">
                                    <div class="card-body">
                                        <h4 class="mt-2"><?= $row->imie ?> <?= $row->nazwisko ?> <?= $row->akronim ?></h4>
                                <?php
                                break;
                        }           
                    ?>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="col">
                <h2>Tablica Wyników</h2>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table border text-center">
                            <thead>
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
                            <tr>
                                <th scope="row">1</th>
                                <td>Mariusz</td>
                                <td>Kebab</td>
                                <td>ZSTIO Limanowa</td>
                                <td>1:25.123</td>
                                <td>Czerwony Szybki</td>
                            </tr>
                            <!-- ELEMENT KONIEC -->
                            <tr>
                                <th scope="row">2</th>
                                <td>Mariusz</td>
                                <td>Kebab</td>
                                <td>ZSTIO Limanowa</td>
                                <td>1:25.123</td>
                                <td>Czerwony Szybki</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Mariusz</td>
                                <td>Kebab</td>
                                <td>ZSTIO Limanowa</td>
                                <td>1:25.123</td>
                                <td>Czerwony Szybki</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Mariusz</td>
                                <td>Kebab</td>
                                <td>ZSTIO Limanowa</td>
                                <td>1:25.123</td>
                                <td>Czerwony Szybki</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Mariusz</td>
                                <td>Kebab</td>
                                <td>ZSTIO Limanowa</td>
                                <td>1:25.123</td>
                                <td>Czerwony Szybki</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Mariusz</td>
                                <td>Kebab</td>
                                <td>ZSTIO Limanowa</td>
                                <td>1:25.123</td>
                                <td>Czerwony Szybki</td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Mariusz</td>
                                <td>Kebab</td>
                                <td>ZSTIO Limanowa</td>
                                <td>1:25.123</td>
                                <td>Czerwony Szybki</td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>Mariusz</td>
                                <td>Kebab</td>
                                <td>ZSTIO Limanowa</td>
                                <td>1:25.123</td>
                                <td>Czerwony Szybki</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>