<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>

<script>

!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(e=e||self,function(){var n=e.Cookies,o=e.Cookies=t();o.noConflict=function(){return e.Cookies=n,o}}())}(this,(function(){"use strict";function e(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)e[o]=n[o]}return e}return function t(n,o){function r(t,r,i){if("undefined"!=typeof document){"number"==typeof(i=e({},o,i)).expires&&(i.expires=new Date(Date.now()+864e5*i.expires)),i.expires&&(i.expires=i.expires.toUTCString()),t=encodeURIComponent(t).replace(/%(2[346B]|5E|60|7C)/g,decodeURIComponent).replace(/[()]/g,escape);var c="";for(var u in i)i[u]&&(c+="; "+u,!0!==i[u]&&(c+="="+i[u].split(";")[0]));return document.cookie=t+"="+n.write(r,t)+c}}return Object.create({set:r,get:function(e){if("undefined"!=typeof document&&(!arguments.length||e)){for(var t=document.cookie?document.cookie.split("; "):[],o={},r=0;r<t.length;r++){var i=t[r].split("="),c=i.slice(1).join("=");try{var u=decodeURIComponent(i[0]);if(o[u]=n.read(c,u),e===u)break}catch(e){}}return e?o[e]:o}},remove:function(t,n){r(t,"",e({},n,{expires:-1}))},withAttributes:function(n){return t(this.converter,e({},this.attributes,n))},withConverter:function(n){return t(e({},this.converter,n),this.attributes)}},{attributes:{value:Object.freeze(o)},converter:{value:Object.freeze(n)}})}({read:function(e){return'"'===e[0]&&(e=e.slice(1,-1)),e.replace(/(%[\dA-F]{2})+/gi,decodeURIComponent)},write:function(e){return encodeURIComponent(e).replace(/%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g,decodeURIComponent)}},{path:"/"})}));

    $(document).ready(function(){
        var id0=$('#0'),id1=$('#1'),id2=$('#2'),id3=$('#3'),id4=$('#4'),id5=$('#5'),id6=$('#6'),id7=$('#7'),id8=$('#8'),id9=$('#9'),id10=$('#10'),id11=$('#11');
        const id = [id0,id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,id11];

        $('.form').detach();
        id[<?php echo $_COOKIE["button"]?>].appendTo("#container");
        $("button").click(function(){
            $('.form').detach();
            $(id[$(this).val()]).appendTo("#container");
            Cookies.set('button', $(this).val())
        });
    });    
</script>


<div class="container-fluid">
    <div class="row m-3">
        <div class="col-4"><h2>Zawody</h2>
            <button type="button" value="6" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zaplanuj</button>
            <button type="button" value="7" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zaczynij</button>
            <button type="button" value="8" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zakończ</button>
            <button type="button" value="11" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Wylosuj Przejazdy</button>
            <button type="button" value="9" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Edytuj</button>
        </div>
        <div class="col-4"><h2>Dodawanie</h2>
            <button type="button" value="4" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" value="5" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Miasto</button>
            <button type="button" value="10" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Gokart</button>
        </div>
        <div class="col-4"><h2>Modyfikacja</h2>
            <button type="button" value="0"  class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Zawodnik</button>
            <button type="button" value="1"  class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Przejazd</button>
            <button type="button" value="2" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Szkoła</button>
            <button type="button" value="3" class="btn btn-outline-dark btn-lg mb-1" data-mdb-ripple-color="dark">Gokart</button>
        </div>
    </div>
    <hr>
    <?php if(isset($validation)) : ?>
            <div class="text-danger">
                <?= $validation->listErrors() ?>
            </div>
    <?php endif; ?>    
    </div>
    <form method="post">
    <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input value="<?= set_value('email') ?>" name ="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <?php
            echo '<pre>';
            print_r($_POST);
            echo '<pre>';
    ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
    <div class="form" id="11"><?= view('forms/formularz', $data = ['formularz' => 11]) ?></div>
</div>



<?= $this->endSection() ?>