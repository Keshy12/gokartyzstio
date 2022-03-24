<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>

<script>

!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(e=e||self,function(){var n=e.Cookies,o=e.Cookies=t();o.noConflict=function(){return e.Cookies=n,o}}())}(this,(function(){"use strict";function e(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)e[o]=n[o]}return e}return function t(n,o){function r(t,r,i){if("undefined"!=typeof document){"number"==typeof(i=e({},o,i)).expires&&(i.expires=new Date(Date.now()+864e5*i.expires)),i.expires&&(i.expires=i.expires.toUTCString()),t=encodeURIComponent(t).replace(/%(2[346B]|5E|60|7C)/g,decodeURIComponent).replace(/[()]/g,escape);var c="";for(var u in i)i[u]&&(c+="; "+u,!0!==i[u]&&(c+="="+i[u].split(";")[0]));return document.cookie=t+"="+n.write(r,t)+c}}return Object.create({set:r,get:function(e){if("undefined"!=typeof document&&(!arguments.length||e)){for(var t=document.cookie?document.cookie.split("; "):[],o={},r=0;r<t.length;r++){var i=t[r].split("="),c=i.slice(1).join("=");try{var u=decodeURIComponent(i[0]);if(o[u]=n.read(c,u),e===u)break}catch(e){}}return e?o[e]:o}},remove:function(t,n){r(t,"",e({},n,{expires:-1}))},withAttributes:function(n){return t(this.converter,e({},this.attributes,n))},withConverter:function(n){return t(e({},this.converter,n),this.attributes)}},{attributes:{value:Object.freeze(o)},converter:{value:Object.freeze(n)}})}({read:function(e){return'"'===e[0]&&(e=e.slice(1,-1)),e.replace(/(%[\dA-F]{2})+/gi,decodeURIComponent)},write:function(e){return encodeURIComponent(e).replace(/%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g,decodeURIComponent)}},{path:"/"})}));

    $(document).ready(function(){
        var id0=$('#form0'),id1=$('#form1'),id2=$('#form2'),id3=$('#form3'),id4=$('#form4'),id5=$('#form5'),id6=$('#form6'),id7=$('#form7'),id8=$('#form8'),id9=$('#form9'),id10=$('#form10'),id11=$('#form11'),id12=$('#form12');
        const id = [id0,id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,id11,id12];
        $('.form').detach();
        id[<?php echo $_COOKIE["button"]?>].appendTo("#container");
        $("button").click(function(){
            $('#error').detach();
            $('.form').detach();
            $(id[$(this).val()]).appendTo("#container");
            Cookies.set('button', $(this).val())
        });
    });    
</script>

<div class="container-fluid">
    <div class="row m-3">
        <div class="col-4"><h2>Zawody</h2>
            <button type="button" value="0" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zaplanuj</button>
            <button type="button" value="1" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zacznij</button>
            <button type="button" value="2" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Wylosuj Przejazdy</button>
            <button type="button" value="3" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zakończ</button>
            <button type="button" value="4" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Edytuj</button>
        </div>
        <div class="col-4"><h2>Dodawanie</h2>
            <button type="button" value="5" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" value="6" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Miasto</button>
            <button type="button" value="7" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Gokart</button>
        </div>
        <div class="col-4"><h2>Modyfikacja</h2>
            <button type="button" value="8"  class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zawodnik</button>
            <button type="button" value="9"  class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Przejazd</button>
            <button type="button" value="10" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" value="11" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Gokart</button>
            <button type="button" value="12" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Miasto</button>
        </div>
    </div> 
    <did id="error">
    <?php if(isset($_SESSION['validation'])) : ?>
        <div class="text-danger">
            <?= $_SESSION['validation']?>
        </div> 
        <?php unset($_SESSION['validation']) ?>
    <?php endif; ?> 
    </div>  
    <div id="container">
    </div>
    <div class="form" id="form0"><?= view('forms/modificationForms', $data = ['modificationForms' => 0]) ?></div>
    <div class="form" id="form1"><?= view('forms/modificationForms', $data = ['modificationForms' => 1]) ?></div>
    <div class="form" id="form2"><?= view('forms/modificationForms', $data = ['modificationForms' => 2]) ?></div>
    <div class="form" id="form3"><?= view('forms/modificationForms', $data = ['modificationForms' => 3]) ?></div>
    <div class="form" id="form4"><?= view('forms/modificationForms', $data = ['modificationForms' => 4]) ?></div>
    <div class="form" id="form5"><?= view('forms/modificationForms', $data = ['modificationForms' => 5]) ?></div>
    <div class="form" id="form6"><?= view('forms/modificationForms', $data = ['modificationForms' => 6]) ?></div>
    <div class="form" id="form7"><?= view('forms/modificationForms', $data = ['modificationForms' => 7]) ?></div>
    <div class="form" id="form8"><?= view('forms/modificationForms', $data = ['modificationForms' => 8]) ?></div>
    <div class="form" id="form9"><?= view('forms/modificationForms', $data = ['modificationForms' => 9]) ?></div>
    <div class="form" id="form10"><?= view('forms/modificationForms', $data = ['modificationForms' => 10]) ?></div>
    <div class="form" id="form11"><?= view('forms/modificationForms', $data = ['modificationForms' => 11]) ?></div>
    <div class="form" id="form12"><?= view('forms/modificationForms', $data = ['modificationForms' => 12]) ?></div>
</div>



<?= $this->endSection() ?>