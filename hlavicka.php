<?php

session_start();

if (!isset($_COOKIE['motiv'])) {
    setcookie('motiv', '1', time() + (60 * 60 * 24 * 10), "/");
}


if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = 'ne';
}

?>


<!DOCTYPE php>
<php lang="cs">

    <head>
        <meta charset="utf-8">
        <title>Autobazar</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">



        <link href="img/favicon.ico" rel="icon">


        <link href="css/googlefonts.css" rel="stylesheet">



        <link href="css/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="css/galerie.css" rel="stylesheet">



        <?php
        if (!isset($_COOKIE['motiv'])) {
        ?>
            <link href="css/style.css" rel="stylesheet">
        <?php
        } else if ($_COOKIE['motiv'] == '1') {
        ?>
            <link href="css/style.css" rel="stylesheet">
        <?php
        } else if ($_COOKIE['motiv'] == '2') {
        ?>
            <link href="css/style_fialova.css" rel="stylesheet">
        <?php
        } else if ($_COOKIE['motiv'] == '3') {
        ?>
            <link href="css/style_zelena.css" rel="stylesheet">
        <?php
        }
        ?>

        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>


    <body>

        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.php">
                                <h1>Auto<span>bazar</span></h1>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">

                            <a href="index.php" class="nav-item nav-link active">Domů</a>
                            <a href="oNas.php" class="nav-item nav-link">O nás</a>
                            <a href="nabidkaAut.php" class="nav-item nav-link">Nabídka aut</a>
                            <a href="kontakt.php" class="nav-item nav-link">Kontakt</a>
                            <a href="feedback.php" class="nav-item nav-link">Zpětná vazba</a>


                            <?php
                            if ($_SESSION['login'] == 'ano') {
                            ?>
                                <a href="odhlaseni.php" class="nav-item nav-link">Odhlásit se</a>
                            <?php
                            } else {
                            ?>
                                <a href="prihlaseniAregistrace.php" class="nav-item nav-link">Přihlásit se</a>
                            <?php
                            }
                            ?>

                            <?php
                            if ($_SESSION['login'] == 'ano') {
                            ?>
                                <a href="fotogalerie.php" class="nav-item nav-link">Fotogalerie</a>
                            <?php
                            }
                            ?>

                            <?php
                            if ($_SESSION['login'] == 'ano') {
                            ?>
                                <a href="administrace.php" class="nav-item nav-link">Administrace</a>
                            <?php
                            }
                            ?>



                            </a>

                        </div>

                    </div>
                </nav>
            </div>
        </div>