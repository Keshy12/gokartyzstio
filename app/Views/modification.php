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

        // $(id[getcookieid]).appendTo("#container");
        // var getcookieid= $.cookie('button_id');
        const id = [id0,id1,id2,id3,id4,id5,id6,id7,id8,id9];
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
            <button type="button" value="4" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" value="5" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Miasto</button>
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
   

   
    <!-- Modyfikowanie Zawodów 
    <div class="row m-3" id="town_form">
        <div class="col"><h2>Modyfikowanie Zawodów</h2>
            <form action="*" method="POST">
                <label for="town_name"><h4>Nazwa</h4></label>
                <input id="town_name" class="form-control form-control-lg w-50 mb-4" type="text" placeholder="Nazwa">
                <input type="submit" value="DODAJ" class="btn btn-secondary" />
            </form>
        </div>
    </div> -->
    
 
<!--
    Formularz Dodawania Szkoły
   <div class="row m-3" id="school_form">
       <div class="col"><h2>Dodawanie Szkoły</h2>
           <form action="*" method="POST">
               <label for="school_name"><h4>Nazwa</h4></label>
               <input id="school_name" class="form-control form-control-lg w-50" type="text" placeholder="Nazwa">
               <label for="school_town"><h4>Miasto</h4></label><br>
               <select id="school_town" class="custom-select custom-select-lg mb-1 w-50">
                   <option value="0">Limanowa (Z BAZY)</option>
               </select><br>
               <input type="submit" value="DODAJ MIASTO" class="btn btn-outline-secondary mb-4" /><br>
               <label for="school_acronym"><h4>Akronim</h4></label>
               <input id="school_acronym" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Akronim">
               <input type="submit" value="DODAJ" class="btn btn-secondary" />
           </form>
       </div>
   </div>

    Formularz Dodawania Miasta
    <div class="row m-3" id="town_form">
        <div class="col"><h2>Dodawanie Miasta</h2>
            <form action="*" method="POST">
                <label for="town_name"><h4>Nazwa</h4></label>
                <input id="town_name" class="form-control form-control-lg w-50 mb-4" type="text" placeholder="Nazwa">
                <input type="submit" value="DODAJ" class="btn btn-secondary" />
            </form>
        </div>
    </div>-->

    <!-- Dodawanie Zawodów
    <div class="row m-3" id="competition_form">
        <div class="col"><h2>Dodawanie Zawodów</h2>
            <form action="*" method="POST">
                <label for="competition_name"><h4>Nazwa</h4></label>
                <input id="competition_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwa">
                <label for="competition_date_start"><h4>Data Rozpoczęcia</h4></label>
                <input id="competition_date_start" class="form-control form-control-lg mb-4 w-50" type="date" >
                <label for="competition_date_end"><h4>Data Zakończenia</h4></label>
                <input id="competition_date_end" class="form-control form-control-lg mb-4 w-50" type="date" >
                <input type="submit" value="DODAJ" class="btn btn-secondary" />
            </form>
        </div>
    </div>-->


</div>



<?= $this->endSection() ?>