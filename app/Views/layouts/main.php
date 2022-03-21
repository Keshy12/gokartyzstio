<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?= isset($meta_title) ? $meta_title : 'ZSTiO Limanowa' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(e=e||self,function(){var n=e.Cookies,o=e.Cookies=t();o.noConflict=function(){return e.Cookies=n,o}}())}(this,(function(){"use strict";function e(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)e[o]=n[o]}return e}return function t(n,o){function r(t,r,i){if("undefined"!=typeof document){"number"==typeof(i=e({},o,i)).expires&&(i.expires=new Date(Date.now()+864e5*i.expires)),i.expires&&(i.expires=i.expires.toUTCString()),t=encodeURIComponent(t).replace(/%(2[346B]|5E|60|7C)/g,decodeURIComponent).replace(/[()]/g,escape);var c="";for(var u in i)i[u]&&(c+="; "+u,!0!==i[u]&&(c+="="+i[u].split(";")[0]));return document.cookie=t+"="+n.write(r,t)+c}}return Object.create({set:r,get:function(e){if("undefined"!=typeof document&&(!arguments.length||e)){for(var t=document.cookie?document.cookie.split("; "):[],o={},r=0;r<t.length;r++){var i=t[r].split("="),c=i.slice(1).join("=");try{var u=decodeURIComponent(i[0]);if(o[u]=n.read(c,u),e===u)break}catch(e){}}return e?o[e]:o}},remove:function(t,n){r(t,"",e({},n,{expires:-1}))},withAttributes:function(n){return t(this.converter,e({},this.attributes,n))},withConverter:function(n){return t(e({},this.converter,n),this.attributes)}},{attributes:{value:Object.freeze(o)},converter:{value:Object.freeze(n)}})}({read:function(e){return'"'===e[0]&&(e=e.slice(1,-1)),e.replace(/(%[\dA-F]{2})+/gi,decodeURIComponent)},write:function(e){return encodeURIComponent(e).replace(/%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g,decodeURIComponent)}},{path:"/"})}));

        $(document).ready(function(){
            function GetSelectedIndex() {
            var i = $('#ddlRole option:selected').index();
            return i;}

            $('select#school_picker option').on('click', function(){
                Cookies.set('school', $(this).attr('id'))
            });

            $('select#competition_picker option').on('click', function(){
                Cookies.set('competition', $(this).attr('id'))
            });

            $('select#competitor_picker option').on('click', function(){
                Cookies.set('competitor', $(this).attr('id'))
            });

            $('select#gokart_picker option').on('click', function(){
                Cookies.set('gokart', $(this).attr('id'))
            });
            
            $('select#ride_picker option').on('click', function(){
                Cookies.set('ride', $(this).attr('id'))
            });
            
            $('.select_location').on('change', function(){
                // let i = $(this)[0].selectedIndex
                // window.location = $(this).children().eq(i).attr('id');
                location.reload();
            })
            
        })
    </script>
    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        body,html{
            height:100%;
        }
        ::-webkit-scrollbar {
            width: 10px;
            background: white;
        }
        ::-webkit-scrollbar-track {
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #555555;
            border-radius: 0px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: gray;
        }
        .navbar-brand:hover {
            transform: scaleX(-1);
        }
    </style>
</head>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark h5">
        <a class="navbar-brand" href="/main">
            <img src="/assets/images/gokart.png" width="85" height="60" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/main">Strona Główna</a>
                </li>
                <li class="nav-item">
                <?php if($_COOKIE["status"] == "w_trakcie" || $_COOKIE["status"] == "oba"): ?>
                    <a class="nav-link" href="/main/comp">Zawody</a>
                <?php else: ?>
                    <a class="nav-link disabled" href="/main/comp">Zawody</a>
                <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/main/arch">Archiwum</a>
                </li>
                <?php if(isset($_SESSION['zalogowany'])) :?>
                    <?php if($_SESSION["zalogowany"] == "pełny"): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/main/mod">Modyfikacja</a>
                    </li>
                        <?php if($_COOKIE["status"] == "w_trakcie"): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/main/judge">Sędzia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="/main/compform">Zgłoszenia</a>
                        </li>
                        <?php elseif($_COOKIE["status"] == "zaplanowane"): ?>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="/main/judge">Sędzia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/main/compform">Zgłoszenia</a>
                        </li>
                        <?php elseif($_COOKIE["status"] == "oba"): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/main/judge">Sędzia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/main/compform">Zgłoszenia</a>
                        </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($_SESSION["zalogowany"] == "limitowany"): ?>
                    <?php if($_COOKIE["status"] == "w_trakcie"): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/main/judge">Sędzia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="/main/compform">Zgłoszenia</a>
                        </li>
                        <?php elseif($_COOKIE["status"] == "zaplanowane"): ?>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="/main/judge">Sędzia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/main/compform">Zgłoszenia</a>
                        </li>
                        <?php elseif($_COOKIE["status"] == "oba"): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/main/judge">Sędzia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/main/compform">Zgłoszenia</a>
                        </li>
                        <?php endif; ?> 
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <span class="navbar-item">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                    <?php if(isset($_SESSION['zalogowany'])) :?>
                        <?php if($_SESSION["zalogowany"] == "pełny" || $_SESSION["zalogowany"] == "limitowany"): ?>
                            <a class="nav-link" href="/main/logout">Wyloguj</a>
                        <?php else: ?>
                            <a class="nav-link" href="/main/login">Logowanie</a>
                        <?php endif; ?>
                    <?php endif;?>
                    </li>
                </ul>
            </span>
        </div>
    </nav>
</header>
<body>
    <div style="min-height: 90%">
    <?= $this->renderSection('content')?>
    </div>
</body>
<footer>
    <div class="text-center p-3 bg-dark">
        <a class="text-white">© 2022 Copyright:</a>
        <a class="link text-white" href="https://zstio.edu.pl/">zstio.edu.pl</a>
    </div>
    <!-- Copyright: Mateusz Potoniec, Marcin Stożek, Marcin Tomaszek, Michał Wiewiórka, Kacper Zięba-->
</footer>

</html>