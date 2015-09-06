<!DOCTYPE html>
<?php include_once "./core/session.php" ?>
<html lang="sl">
<head>
    <title>Salon Deja</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-type:text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Prepustite se razvajanju v Kozmetičnem salonu Deja, da se boste počutile še lepše in samozavestnejše">
    <meta name="author" content="Žiga Strgar">
    <meta name="robots" content="index,follow">
    <meta name="keywords" content="salon, kozmetika, deja, salon deja, razvajanje, kozmetični salon, kozmetični salon Maribor, hujšanje, program hujšanja, preoblikovanje telesa, kozmetični salon Deja, kavitacija, presoterapija, elektrosimulacija, radiofrekvenca, pedikura, masaša, masaže, nega obraza, depilacija, depiliranje, intimna depilacija, brazilska depilacija, kozmetične storitve, darilni boni">
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link href="assets/css/main.css" rel="stylesheet" type="text/css"/>
    <script src="./assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
</head>
<body>
<?php if ( isset($_SESSION["notify"]) ) { ?>
    <?php $notify = explode("|", $_SESSION["notify"]); ?>
    <script>
        $().ready(function () {
            alertify.<?php echo $notify[0]; ?>("<?php echo $notify[1]; ?>");
        });
    </script>
    <?php unset($_SESSION["notify"]); ?>
<?php } ?>
<header>
    <div class="header header-small">
        <span class="header-icons">
            <span class="header-item"><i class="fa fa-map-marker header-icon"></i> Tabor - Beograjska ulica 6a</span>
            <span class="header-item"><i class="fa fa-building-o header-icon"></i> 2000 Maribor</span>
            <span class="header-item"><i class="fa fa-phone header-icon"></i> 02/331-42-19</span>
            <span class="header-item"><i class="fa fa-at header-icon"></i> <a href="mailto: info@salon-deja.si">info@salon-deja.si</a></span>
            <span class="header-item"><i class="fa fa-car header-icon"></i> Brezplačno parkiranje</span>
        </span>
        <span class="pull-right margins">
            <?php if ( ! isset($_SESSION["user_id"]) ) { ?>
                <a href="login.php">Prijava</a>
            <?php } else { ?>
                <a href="addAction.php">Dodaj akcijo</a>
                <a href="editPricing.php">Uredi cenik</a>
                <a href="editHours.php">Uredi delovni čas</a>
                <a href="logout.php">Odjava</a>
            <?php } ?>
        </span>

        <div class="clearfix"></div>
    </div>
    <div class="navbar navbar-default">
        <div class="navbar-header text-center">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span>MENU</span>
            </button>
            <div class="navbar-brand">
                <a href="index.php">
                    <img src="assets/img/logo.png" alt="Logotip" class="img-responsive" style="margin-top: -13px;" width="100"/>
                </a>
            </div>
            <span class="slogan navbar-text h4" style="display: block;">... da boste še lepše</span>
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
                    <a href="program.php">Programi hujšanja in preoblikovanja telesa</a>
                </li>
                <li>
                    <a href="pricing.php">Cenik</a>
                </li>
                <li>
                    <a href="contact.php#work_hours">Delovni čas</a>
                </li>
                <li>
                    <a href="about.php">O nas</a>
                </li>
                <li>
                    <a href="contact.php">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</header>
<div class="container" style="margin-top: 30px;">
    <div class="row">