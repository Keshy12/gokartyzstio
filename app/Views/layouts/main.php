<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?= isset($meta_title) ? $meta_title : 'ZSTiO Limanowa' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
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
                    <a class="nav-link" href="/main/comp">Zawody</a>
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
                        <?php elseif($_COOKIE["status"] == "oba"): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/main/competitor_form">Zgłoszenia</a>
                        </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($_SESSION["zalogowany"] == "limitowany"): ?>
                    <?php if($_COOKIE["status"] == "w_trakcie"): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/main/judge">Sędzia</a>
                        </li>
                        <?php elseif($_COOKIE["status"] == "oba"): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/main/competitor_form">Zgłoszenia</a>
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
</body>
<footer class="static-bottom">
  <div class="text-center p-3 bg-dark">
      <a class="text-white">© 2022 Copyright:</a>
      <a class="link text-white" href="https://zstio.edu.pl/">zstio.edu.pl</a>
  </div>
<!-- Copyright -->
</footer>
</html>