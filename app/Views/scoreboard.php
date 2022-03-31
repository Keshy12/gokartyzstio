<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center mb-3">Szkoła</h2>
                    <table class="table text-center table-bordered table-sm ">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">🏆</th>
                            <th scope="col">Szkoła</th>
                            <th scope="col">Akronim</th>
                            <th scope="col">Średni czas</th>
                        </tr>
                        </thead>
                        <tbody class="font-weight-bold">
                            <tr>
                                <th scope="row">1</th>
                                <td>Jeżeli zwraca tylko 1 row to nie wyświetlać</td>
                                <td>ZSTIO</td>
                                <td>1:12.432</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center mb-3">Tablica Wyników</h2>
                    <table class="table text-center table-bordered table-sm ">
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