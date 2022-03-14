<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col">
                <h2>Aktualne Przejazdy</h2>
                <div class="card border-secondary mb-2">
                    <div class="card-body">
                        <h4 class="mt-2">Marcin Tomaszek ZSTIO Limanowa Czas: 2:59.932</h4>
                    </div>
                </div>
                <div class="card border-success mb-2">
                    <div class="card-body">
                        <h4 class="mt-2">Kacper Zięba ZSTIO Rupniów City</h4>
                    </div>
                </div>
                <div class="card border-info mb-2">
                    <div class="card-body">
                        <h4 class="mt-2">Michał Wiewiórka ZSTIO Limanowa</h4>
                    </div>
                </div>
                <div class="card border-info mb-2">
                    <div class="card-body">
                        <h4 class="mt-2">Mateusz Potoniec ZSTIO Limanowa</h4>
                    </div>
                </div>
                <div class="card border-info mb-3">
                    <div class="card-body">
                        <h4 class="mt-2">Marcin Stożek ZSTIO Limanowa</h4>
                    </div>
                </div>
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