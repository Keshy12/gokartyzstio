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
        $(document).ready(function(){
            function GetSelectedIndex() {
            var i = $('#ddlRole option:selected').index();
            return i;}
            // !function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?a(require("jquery")):a(jQuery)}(function(a){function b(a){return h.raw?a:encodeURIComponent(a)}function c(a){return h.raw?a:decodeURIComponent(a)}function d(a){return b(h.json?JSON.stringify(a):String(a))}function e(a){0===a.indexOf('"')&&(a=a.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{return a=decodeURIComponent(a.replace(g," ")),h.json?JSON.parse(a):a}catch(b){}}function f(b,c){var d=h.raw?b:e(b);return a.isFunction(c)?c(d):d}var g=/\+/g,h=a.cookie=function(e,g,i){if(void 0!==g&&!a.isFunction(g)){if(i=a.extend({},h.defaults,i),"number"==typeof i.expires){var j=i.expires,k=i.expires=new Date;k.setTime(+k+864e5*j)}return document.cookie=[b(e),"=",d(g),i.expires?"; expires="+i.expires.toUTCString():"",i.path?"; path="+i.path:"",i.domain?"; domain="+i.domain:"",i.secure?"; secure":""].join("")}for(var l=e?void 0:{},m=document.cookie?document.cookie.split("; "):[],n=0,o=m.length;o>n;n++){var p=m[n].split("="),q=c(p.shift()),r=p.join("=");if(e&&e===q){l=f(r,g);break}e||void 0===(r=f(r))||(l[q]=r)}return l};h.defaults={},a.removeCookie=function(b,c){return void 0===a.cookie(b)?!1:(a.cookie(b,"",a.extend({},c,{expires:-1})),!a.cookie(b))}});
            $('.select_location').on('change', function(){
                let i = $(this)[0].selectedIndex
                window.location = $(this).children().eq(i).attr('id');
            });
            
        })
    </script>
    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark h5">
        <a class="navbar-brand" href="/main">
            <img src="/assets/images/gokart.png" width="80" height="50" alt="">
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
                        <?php elseif($_COOKIE["status"] == "zaplanowane"): ?>
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
    <?= $this->renderSection('content')?>
    <footer>
        <div class="text-center p-3 bg-dark">
            <a class="text-white">© 2022 Copyright:</a>
            <a class="link text-white" href="https://zstio.edu.pl/">zstio.edu.pl</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>