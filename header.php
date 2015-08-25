<!DOCTYPE html>
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
    <link href='http://fonts.googleapis.com/css?family=Dosis|Kaushan+Script&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
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
                    <a href="program.php">Program hujšanja</a>
                </li>
                <li>
                    <a href="pricing.php">Cenik</a>
                </li>
                <li>
                    <a href="contact.php#work_hours">Delovnik</a>
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