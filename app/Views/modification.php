<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
<script>
    $(document).ready(function(){
        var id0 = $('#0').detach();
        var id1 = $('#1').detach();
        var id2 = $('#2').detach();
        var id3 = $('#3').detach();
        var id4 = $('#4').detach();
        var id5 = $('#5').detach();
        var id6 = $('#6').detach();
        var id7 = $('#7').detach();
        var id8 = $('#8').detach();
        var id9 = $('#9').detach();
        var id9 = $('#10').detach();

  // $(".form").hide();
        // $("button").click(function(){
        //     var id = $(this).val();
        //     $(".form").hide();
        // //     $("#"+id).show();
        // // });

        // var id0 = $('#0').detach();
        // var id1 = $('#1').detach();
        // var id2 = $('#2').detach();
        // var id3 = $('#3').detach();
        // var id4 = $('#4').detach();
        // var id5 = $('#5').detach();
        // var id6 = $('#6').detach();
        // var id7 = $('#7').detach();
        // var id8 = $('#8').detach();
        // var id9 = $('#9').detach();


        if(<?php echo $_COOKIE["button"]?>!=0){var id0 = $('#0').detach();}else{var id0=$('#0')}
        if(<?php echo $_COOKIE["button"]?>!=1){var id1 = $('#1').detach();}else{var id1=$('#1')}
        if(<?php echo $_COOKIE["button"]?>!=2){var id2 = $('#2').detach();}else{var id2=$('#2')}
        if(<?php echo $_COOKIE["button"]?>!=3){var id3 = $('#3').detach();}else{var id3=$('#3')}
        if(<?php echo $_COOKIE["button"]?>!=4){var id4 = $('#4').detach();}else{var id4=$('#4')}
        if(<?php echo $_COOKIE["button"]?>!=5){var id5 = $('#5').detach();}else{var id5=$('#5')}
        if(<?php echo $_COOKIE["button"]?>!=6){var id6 = $('#6').detach();}else{var id6=$('#6')}
        if(<?php echo $_COOKIE["button"]?>!=7){var id7 = $('#7').detach();}else{var id7=$('#7')}
        if(<?php echo $_COOKIE["button"]?>!=8){var id8 = $('#8').detach();}else{var id8=$('#8')}
        if(<?php echo $_COOKIE["button"]?>!=9){var id9 = $('#9').detach();}else{var id9=$('#9')}
        if(<?php echo $_COOKIE["button"]?>!=10){var id9 = $('#9').detach();}else{var id9=$('#10')}

        // var id0 = $('#0').detach();
        // var id1 = $('#1').detach();
        // var id2 = $('#2').detach();
        // var id3 = $('#3').detach();
        // var id4 = $('#4').detach();
        // var id5 = $('#5').detach();
        // var id6 = $('#6').detach();
        // var id7 = $('#7').detach();
        // var id8 = $('#8').detach();
        // var id9 = $('#9').detach();
        //$(id[$_COOKIE["button"]).appendTo("#container");

        // $(id[getcookieid]).appendTo("#container");
        // var getcookieid= $.cookie('button_id');
        

        const id = [id0,id1,id2,id3,id4,id5,id6,id7,id8,id9,id10];

        $("button").click(function(){
            // let cid=$(this).val()
            // document.cookie = `button_id=${cid}`
            
            $('.form').detach();
            $(id[$(this).val()]).appendTo("#container");
        });
    });  
</script>
<div class="container-fluid">
<div class="row m-3">
        <div class="col-4"><h2>Zawody</h2>
            <button type="button" value="6" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zaplanuj</button>
            <button type="button" value="7" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zaczynij</button>
            <button type="button" value="8" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zakończ</button>
        </div>
        <div class="col-3"><h2>Dodawanie</h2>
            <button type="button" value="4" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" value="5" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Miasto</button>
            <button type="button" value="10" class="btn btn-outline-dark btn-lg" data-mdb-ripple-color="dark">Gokart</button>
        </div>
        <div class="col-4"><h2>Modyfikacja</h2>
            <button type="button" value="0"  class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zawodnik</button>
            <button type="button" value="1"  class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Przejazd</button>
            <button type="button" value="2" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" value="3" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Gokart</button>
            <button type="button" value="9" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zawody</button>
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
    <div class="form" id="8"><?= view('forms/formularz', $data = ['formularz' => 8]) ?></div>
    <div class="form" id="9"><?= view('forms/formularz', $data = ['formularz' => 9]) ?></div>
    <div class="form" id="10"><?= view('forms/formularz', $data = ['formularz' => 10]) ?></div>
</div>



<?= $this->endSection() ?>