<!DOCTYPE html>
<?php include_once "./core/session.php" ?>
<html lang="sl">
<head>
    <title>Salon Deja</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-type:text/html; charset=utf-8"/>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description"
          content="Prepustite se razvajanju v Kozmetičnem salonu Deja, da se boste počutile še lepše in samozavestnejše">
    <meta name="author" content="Žiga Strgar">
    <meta name="robots" content="index,follow">
    <meta name="keywords"
          content="salon, kozmetika, deja, salon deja, razvajanje, kozmetični salon, kozmetični salon Maribor, hujšanje, program hujšanja, preoblikovanje telesa, kozmetični salon Deja, kavitacija, presoterapija, elektrosimulacija, radiofrekvenca, pedikura, masaša, masaže, nega obraza, depilacija, depiliranje, intimna depilacija, brazilska depilacija, kozmetične storitve, darilni boni">
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link href="assets/css/main.css" rel="stylesheet" type="text/css"/>
    <script src="./assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq)return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1641449062537605'); // Insert your pixel ID here.
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=1641449062537605&ev=PageView&noscript=1"
        /></noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->

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
            <span class="header-item"><i class="fa fa-group header-icon"></i> <a href="about.php">O nas</a></span>
        </span>
        <span class="pull-right margins">
            <?php if ( !isset($_SESSION["user_id"]) ) { ?>
                <a href="login.php">Prijava</a>
            <?php } else { ?>
                <a href="addAction.php">Dodaj akcijo</a>
                <a href="addNews.php">Dodaj novico</a>
                <a href="addProduct.php">Dodaj izdelek</a>
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
                    <img src="assets/img/logo.png" alt="Logotip" class="img-responsive" style="margin-top: -13px;"
                         width="100"/>
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
                    <a href="actions.php">Akcije</a>
                </li>
                <li>
                    <a href="program.php">Programi preoblikovanja telesa</a>
                </li>
                <li>
                    <a href="packages.php">Paketi ugodnosti</a>
                </li>
                <li>
                    <a href="products.php">Produkti</a>
                </li>
                <li>
                    <a href="pricing.php">Cenik</a>
                </li>
                <li>
                    <a href="news.php">Novice</a>
                </li>
                <li>
                    <a href="contact.php#work_hours">Delovni čas</a>
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