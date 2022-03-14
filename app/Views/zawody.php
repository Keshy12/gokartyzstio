<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
    <div class="container-fluid">
        <h1 class="mt-3">Aktualne Przejazdy</h1>
        <div class="row mt-3">
            <div class="col">
                <div class="card border-secondary mb-3">
                    <div class="card-body">
                        <h4 class="mt-2">Marcin Tomaszek ZSTIO Limanowa Czas: 2:59.932</h4>
                    </div>
                </div>
                <div class="card border-success mb-3">
                    <div class="card-body">
                        <h4 class="mt-2">Kacper Zięba ZSTIO Rupniów City</h4>
                    </div>
                </div>
                <div class="card border-info mb-3">
                    <div class="card-body">
                        <h4 class="mt-2">Michał Wiewiórka ZSTIO Limanowa</h4>
                    </div>
                </div>
                <div class="card border-info mb-3">
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
                <h4 class="mt-2">Tablica Wyników</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table border text-center vw-50">
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
                            <tbody>
                            <tr class="table-default">
                                <th scope="row">1</th>
                                <td>Mariusz</td>
                                <td>Kebab</td>
                                <td>ZSTIO Limanowa</td>
                                <td>1:25.123</td>
                                <td>Czerwony Szybki</td>
                            </tr>
                            <tr class="table-default">
                                <th scope="row">2</th>
                                <td>Mariusz</td>
                                <td>Kebab</td>
                                <td>ZSTIO Limanowa</td>
                                <td>1:25.123</td>
                                <td>Czerwony Szybki</td>
                            </tr>
                            <tr class="table-default">
                                <th scope="row">3</th>
                                <td>Mariusz</td>
                                <td>Kebab</td>
                                <td>ZSTIO Limanowa</td>
                                <td>1:25.123</td>
                                <td>Czerwony Szybki</td>
                            </tr>
                            <tr class="table-default">
                                <th scope="row">4</th>
                                <td>Mariusz</td>
                                <td>Kebab</td>
                                <td>ZSTIO Limanowa</td>
                                <td>1:25.123</td>
                                <td>Czerwony Szybki</td>
                            </tr>
                            <tr class="table-default">
                                <th scope="row">5</th>
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