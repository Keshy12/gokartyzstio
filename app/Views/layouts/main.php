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

            $('select#city_picker option').on('click', function(){
                Cookies.set('city', $(this).attr('id'))
            });
            
            $('.select_location').on('change', function(){
                // let i = $(this)[0].selectedIndex
                // window.location = $(this).children().eq(i).attr('id');
                location.reload(true);
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
        body {
            background: rgb(255,255,255);
            background: linear-gradient(124deg, rgba(255,255,255,0.05) 12%, rgba(246,255,0,0.05) 46%, rgba(255,0,0,0.05) 76%);
            background-attachment: fixed;
            background-size: 100% 100%;
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
    <!--
        Wykonawcy: Mateusz Potoniec, Marcin Stożek, Marcin Tomaszek, Michał Wiewiórka, Kacper Zięba.
        Grafika/Logo: Sandra Cydeiko.
@@@@@@@@@@@@@@@@@@@@@@@@@@@&&&&&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&&&&&@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@&####BB##&&&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&&&&#BB#####&@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@&##BGB#BPYJYG##&&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&&&#GYJJPB##GG##&@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@&##GJ?J5G##BY!!?PB#&&@@@@@@@@@@&&&&&&&&&#######&&&&&&&&@@@@@@@@@@&&##PJ!!JG##GPJ??P##&@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@##BJ??JYYYPB##P?^~JP##&&@&&&&##BGP5YJ??77777777??JY5PGB##&&&&@&&##GJ!^7P#&BPYYYYJ??G##@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@&##5??JYYYYYY5G#&G?~^!YB##BG5J7!~~^^^~~~~~~~~~~~~~~^^^~~!7J5GB##B57~^7P##G5YYYYYYJ??Y##&@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@##BJ??YYYYYYYYY5G##P7~~~?7~~^~~~!!!!!!!!!!!!!!!!!!!!!!!!~~~^~~7?!~~!5##B5YYYYYYYYYJ??G##@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@&##P??JYYYYYYYYY5P###J~!!~~!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!~~!!~?###G5YYYYYYYYYJ??5##&@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@&##Y??JYYYYYYY5G##GJ7!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!JP##BPYYYYYYYJ??Y##&@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@&##Y??JYYYYY5B&#P?~~!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!~~75B&BPYYYYYY??JB##@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@##BJ??YYYY5B&#57~~!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!~~!YB&BPYYYYJ?JB##@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@##BJ??YYYG##P7~~!!!!!!!!!~^^:^~!!!!!!!!!!!!!!!!!!!!!!!!!!!!~^::^~!!!!!!!!!!~!5##G5YYJ??B##@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@&##Y??JPB&B?~~!!!!!!!!!~.      :!!!!!!!!!!!!!!!!!!!!!!!!!!:      .^!!!!!!!!!!~7G&#PJ??JB##@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@&##5??P#&P!~!!!!!!!!!!!.        ^!!!!!!!!!!!!!!!!!!!!!!!!~         ~!!!!!!!!!!~!Y##GJ?Y##&@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@&##P?G##Y~!!!!!!!!!!!!!^.     .:~!!!!!!!!!!!!!!!!!!!!!!!!!^.     .^!!!!!!!!!!!!!~?#&B?5##&@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@##BG##J~!!!!!!!!!!!~~~~!~~~~~!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!~~~~~~!~~~!!!!!!!!!!!~7B&BG##@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@&####J~!!!!!!!!!!~!7?JJ?7!~!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!~!?JJJ7!~~!!!!!!!!!~7B###&@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@###J~!!!!!!!!!~75B##G5PBGJ~!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!~?PBG5G##BP7~!!!!!!!!!~?###@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@&##5~!!!!!!!!!~7B##&P.  J&&5~!!!!!!!!!!!!~~~~~~!!!!!!!!!!!!~Y#&5.  Y&###J~!!!!!!!!!~Y##&@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@##B!~!!!!!!!!!~5&###BY?JB###7~!!!!!!~^:.        ..:^~!!!!!~!B##BY?JB####G!!!!!!!!!!!!G##@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@&##Y~!!!!!!!!!!~J#####&&&###5!!!!!^:.   :~7????7!^.   .^~!!!~Y###&&&####&Y~!!!!!!!!!!~?##&@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@##B!~!!!!!!!!!!!~?5GGBBGGPY7~!!~:.   .7GBBBBBBBBBBGJ.    :~!!~7Y5PGBBBGP?!!!!!!!!!!!!!!G##@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@##P~!!!!!!!!!!!!!~~~!!!!~~~!!^:      ~&#BGGGGGGGGB#&?      .^!!~~~!!!!!~~!!!!!!!!!!!!!~Y##@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@&##Y~!!!!!!!!!!!!!!!!!!!!!!!^.        ^G&##########&B~        .^~!!!!!!!!!!!!!!!!!!!!!!~J##@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@&##Y~!!!!!!!!!!!!!!!!!!!!~^.    :??:  .^YB########B5~.  .7?:     :~!!!!!!!!!!!!!!!!!!!!~?##@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@&##Y~!!!!!!!!!!!!!!!!!!~:       ^B@G^   .^!JG##BY7^.   :5&#!       :~!!!!!!!!!!!!!!!!!!~J##@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@##5^!!!!!!!!!!!!!!!~^.          :5&#Y!:^!?PB###PJ!^:~J#&P~          .^~!!!!!!!!!!!!!!!^J##@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@##B^.^^~~!!!!~~~^:.               ~5B#################5!.              .:^~~~!!!!~~~^.:G##@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@&#&5     ....                       ~################~                       ....     J&#&@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@&##?.                               Y&#B5YJJJJJ5B#&J                               .7##&@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@&##J:..                            .Y&#Y!~~~~!Y#&Y.                             ..7###@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@&##P~...                            !G&#GPPG#&G!                            ...^Y##&@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@&###Y~::..                          .~?5PP5?~.                          ..:.^?B##&@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@&###5!::::...                                                    ...::.:!YB##&@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@&&&#GY7^:::::....                                        ....:::::^!JG#&&&@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@&&@@@@@@@@@@&&&#BPJ7~::::::::::.........            .........:::::::.::^!JPB#&&&@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@###&@@@@@@@@@@@@@&####BPYJ7~^^:::::::::::::::::::::::::::::::::::^~7?YPB#####&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@#####@@@@@@@@@@@@@&##GPGB#####BGP5YJ??7!!!~~~~~~~~~~~~!!!77?JY5PGB#####BGGG###@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@##BYB##@@@@@@@@@@@#####BGPPPPPGGBBB############################BBBGGPPPPPGB#####@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@&##J!J###@@@@@@@@@##BJJ5GB###BGGPPP55PPPPPPPPB##?~~7B#BPPPPPPPP55PPPPGB####GPJ?G##&@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@##G~77JB##&@@@@@@##B?777!!!!J5GB#####BBBGGGPPG##P555##BPPGGGBBBB####BGPY7!!!!77?B##@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@#&P:7?775B##&@@@&##577?!!!^    .^~!?JY5PPGGB###BGP5PB###BGGGP55Y?!~^:.   :!!!777Y##&@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@##G:^??77?5B##&&&##J77?!!!!:         .:::::5&#J^::::^7B&P^::::.         :!!!!777?##&@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@&##!.~7?7777J5GB###Y77?!!!!!^         .::.~#&Y:::::^: 7&&?.::.         :!!!!!777J##&@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@##P:.^7??7777775##577?7!!!!!~:         ::~#&P^:::::. J&&7.:.        .~!!!!!7?77Y##&@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@&##5:.:~7??77JPB##B7777!!!!!!!~.        ::7B&G?~^^^!P&#J::.       .^!!!!!!!7?77P###&&@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@&##P~.::~!?P##PP##Y77?7!!!!!!!!^.       ::^JG##BB##BY~.:.      .^!!!!!!!!!?77J##GP###@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@###Y^..^G&BJ77G&B?7??!!!!!!!!!!~.      :..:^!!!!~:..:.     .^!!!!!!!!!!7?77G&B?7?B##@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@&##B5!Y&#J777J#&G77?7!!!!!!!!!!!~:   7PJ::::::::::?P?.  :~!!!!!!!!!!!7?77P##Y7?7?B##@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@&&&###G77777Y##P77?7!!!!!!!!!!!!~:.P@B^:::::::::G@G:.~!!!!!!!!!!!!7?775##577777P##@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@&##P7777775##577?7!!!!!!!!!!!!!~P&B^:::::::::P&G~!!!!!!!!!!!!!7?77Y#&P7777775##&@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@##B?7777775##577?7!!!!!!!!!!!!!G&B^:::::::::P&B!!!!!!!!!!!!!7?77Y#&G7777777G##@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@&##57777777P##577?7!!!!!!!!!!!~P&B^.::::::::P&B!!!!!!!!!!!!7?77Y#&G7777777Y##&@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@&##J77777775##P77?7!!!!!!!!!!~P&B7~^^^^^^~!G&B!~!!!!!!!!!7?77Y#&P7777777?B##@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@##BJ7777777Y#&G?7??!~~~~~~!!!P&B?7??77????G&B!!!~~~~~~!7?77P##57777777?B##@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&##PY???777JB#BY~^::.    ..^G&B?777777777G&B~..     ::^~JB#BY7777??JP###@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&&###BBGGGGB###P?^::.     7##BGGGGGGGGGGB##J.    ..:^7P###BGGGGBB###&&@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&&&&&&&&&&&&#BG555555G##&&&&&&&&&&&&&&##G555555PB#&&&&&&&&&&&&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&&@@@@@@&&@@@@@@@@@@@@@@@@&&@@@@@@&&&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
     -->
</footer>

</html>