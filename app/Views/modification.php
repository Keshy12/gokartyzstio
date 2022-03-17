<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
<script>
    $(document).ready(function(){
        // $(".form").hide();
        // $("button").click(function(){
        //     var id = $(this).val();
        //     $(".form").hide();
        //     $("#"+id).show();
        // });

        var id0 = $('#0').detach();
        var id1 = $('#1').detach();
        var id2 = $('#2').detach();
        var id3 = $('#3').detach();
        var id4 = $('#4').detach();
        var id5 = $('#5').detach();
        var id6 = $('#6').detach();
        var id7 = $('#7').detach();

        const id = [id0,id1,id2,id3,id4,id5,id6,id7];
        $("button").click(function(){
            $('.form').detach();
            $(id[$(this).val()]).appendTo("#container");
           
        });

    });  
</script>


<div class="container-fluid">
    <div class="row m-3">
        <div class="col-4"><h2>Zawody</h2>
            <button type="button" value="6" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Zaczynij</button>
            <button type="button" value="7" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Zaplanuj</button>
            <button type="button" value="8" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Edytuj</button>
        </div>
        <div class="col-3"><h2>Dodawanie</h2>
            <button type="button" value="4" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" value="5" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Miasto</button>
        </div>
        <div class="col-5"><h2>Modyfikacja</h2>
            <button type="button" value="0"  class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Zawodnik</button>
            <button type="button" value="1"  class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Przejazd</button>
            <button type="button" value="2" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" value="3" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Gokart</button>
        </div>
    </div>
    <hr>
    <div id="container">

    </div>
    <div class="form" id="0"><?= view('forms/formularz', $data = ['formularz' => 0]) ?></div>
    <div class="form" id="1"><?= view('forms/formularz', $data = ['formularz' => 1]) ?></div>
    <div class="form" id="2"><?= view('forms/formularz', $data = ['formularz' => 2]) ?></div>
    <div class="form" id="3"><?= view('forms/formularz', $data = ['formularz' => 3]) ?></div>
    <div class="form" id="4"><?= view('forms/formularz', $data = ['formularz' => 4]) ?></div>
    <div class="form" id="5"><?= view('forms/formularz', $data = ['formularz' => 5]) ?></div>
    <div class="form" id="6"><?= view('forms/formularz', $data = ['formularz' => 6]) ?></div>
    <div class="form" id="7"><?= view('forms/formularz', $data = ['formularz' => 7]) ?></div>
</div>



<?= $this->endSection() ?>