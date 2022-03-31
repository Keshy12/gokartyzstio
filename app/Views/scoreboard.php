<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <?php if(isset($resultSchoolLeaderboard)) :?>
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
                                <?php foreach($resultSchoolLeaderboard as $key=>$row) :?>
                                    <tr>
                                        <th scope="row"><?= $key +1 ?></th>
                                        <td><?= $row->nazwa ?></td>
                                        <td><?= $row->akronim ?></td>
                                        <td><?= $row->czas ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
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