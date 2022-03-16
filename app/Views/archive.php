<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>

<div class="container-fluid">
    <h2 class="mt-3">Historia Zawodów</h2>
    <div class="row mt-3">

            <?php foreach($result as $row) :?>
                    <?php if($row->status_zawodow_id==2): echo('<div class="card border-success bg-success mb-3 vw-50 p-2 m-3 ml-5 " style="width:45%">')?>
                    <?php else: echo('<div class="card mb-3 vw-50 p-2 m-3 ml-5 " style="width:45%">')?>
                    <?php  endif; ?>
                        <div class="card-body">
                            <h4 class="card-title"><?= $row->nazwa ?></h4>
                            <p >Data: <?= $row->data_rozpoczecia ?> / <?= $row->nazwa ?> </p>
                            <?php if($row->status_zawodow_id==2): echo "<a href='/main/score'>"?>
                            <?php else: echo "<a href='arch/archiveTable/$row->zawody_id'>" ?>
                            <?php  endif; ?>
                            <button type="button" class="btn btn-outline-dark">Tabela Wyników</button></a>
                        </div>
                    </div>
            <?php endforeach; ?>
           
    </div>
</div>
<?= $this->endSection() ?>