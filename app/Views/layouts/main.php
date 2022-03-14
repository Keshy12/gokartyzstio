<!DOCTYPE html>
<html lang="pl">
<head>
    <style>
        #footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            /* Height of the footer*/ 
        }
    </style>
    <meta charset="UTF-8">
    <title><?= isset($meta_title) ? $meta_title : 'ZSTiO Limanowa' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark h5">
        <a class="navbar-brand" href="/gokarty">
            <img src="/assets/images/gokart.png" width="80" height="50" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/gokarty">Strona Główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gokarty/zawody">Zawody</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gokarty/archiwum">Archiwum</a>
                </li>
                <?php if(isset($_SESSION["zalogowany"])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/gokarty/modyfikacja">Modyfikacja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gokarty/sedzia">Sędzia</a>
                </li>
                <?php endif ?>
            </ul>
            <span class="navbar-item">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                    <?php if(isset($_SESSION["zalogowany"])): ?>
                        <a class="nav-link" href="/gokarty/wylogowanie">Wyloguj</a>
                    <?php else: ?>
                        <a class="nav-link" href="/gokarty/logowanie">Logowanie</a>
                    <?php endif ?>
                    </li>
                </ul>
            </span>
        </div>
    </nav>
</header>
<body>
    <?= $this->renderSection('content')?>
</body>
<footer id="footer">
  <div class="text-center p-3 bg-dark">
      <a class="text-white">© 2022 Copyright:</a>
      <a class="link text-white" href="https://zstio.edu.pl/">zstio.edu.pl</a>
  </div>
<!-- Copyright -->
</footer>
</html>