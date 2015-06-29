<!DOCTYLE html>
<?php include_once "./core/session.php" ?>
<html lang="sl">
<head>
    <title>Salon Deja</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-type:text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Žiga Strgar">
    <meta name="robots" content="index,follow">
    <link href="assets/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <script src="./assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato|Roboto&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
    <div class="header header-small">
        <span class="header-icons">
            <i class="fa fa-map-marker header-icon"></i> Tabor - Beograjska ulica 6a
            <i class="fa fa-building-o header-icon"></i> 2000 Maribor
            <i class="fa fa-phone header-icon"></i> 02/331-42-19
            <i class="fa fa-at header-icon"></i> <a href="mailto: info@salon-deja.si">info@salon-deja.si</a>
        </span>
        <span class="pull-right margins">
            <?php if ( ! isset($_SESSION["user_id"]) ) { ?>
                <a href="login.php">Prijava</a>
            <?php } else { ?>
                <a href="addAction.php">Dodaj akcijo</a>
                <a href="editPricing.php">Uredi cenik</a>
                <a href="logout.php">Odjava</a>
            <?php } ?>
        </span>
    </div>
    <div class="navbar navbar-default">
        <div class="navbar-header text-center">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span>MENU</span>
            </button>
            <div class="navbar-brand">
                <img src="assets/img/logo.png" alt="Logotip" class="img-responsive" style="margin-top: -13px;" width="100"/>
            </div>
            <p class="slogan navbar-text text-uppercase">... da boste še lepše</p>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left text-uppercase">
                <li>
                    <a href="index.php">Domov</a>
                </li>
                <li>
                    <a href="services.php">Storitve</a>
                </li>
                <li>
                    <a href="program.php">Program hujšanja</a>
                </li>
                <li>
                    <a href="pricing.php">Cenik</a>
                </li>
                <li>
                    <a href="work_hours.php">Delovnik</a>
                </li>
                <li>
                    <a href="contact.php">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">