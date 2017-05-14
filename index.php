<?php include_once "header.php"; ?>
    <div class="block-flat">
        <h1 class="hidden">Domača stran</h1>
        <img src="./assets/img/naslovna-3.jpg" alt="Naslovna slika" class="img-responsive" style="margin: 0 auto;"/>

        <h3 class="text-center action">Prepustite se razvajanju v Kozmetičnem salonu Deja, da se boste počutile še lepše
            in samozavestnejše</h3>

        <div class="clearifx"></div>
        <!--<h2 class="text-center action page-header">VESELI DECEMBER</h2>

        <p style="font-size: 1.3em !important">Pa smo dočakali december - mesec veselja, praznovanj in obdarovanja. V našem salonu Vam nudimo darilne bone, ki so več ko primerno darilo ob prihajajočih prazniki.</p>
        <p style="font-size: 1.3em !important">Ob tem bi Vas radi spomnili na naša, trenutno najbolj atraktivna, paketa ugodnosti:</p>
        <ul style="font-size: 1.3em">
            <li>Paket 1: nega obraza + masaža celega telesa <span class="action">SAMO 40,00 €</span></li>
            <li>Paket 2: nega obraza + delna masaža telesa <span class="action">SAMO 32,00 €</span></li>
        </ul>-->
        <?php
        $action = Db::queryOne("SELECT * FROM actions WHERE valid >= ? ORDER BY valid DESC LIMIT 1", date("Y-m-d"));
        ?>
        <?php if ( !empty($action) ) { ?>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <h1 class="page-header action text-center">AKCIJA</h1>
                <p>
                    <?= $action["text"]; ?>
                </p>
                <small class="text-muted">Akcija velja
                    do: <?= date("d. m. Y", strtotime($action["valid"])) ?></small>
                <?php if ( !empty($_SESSION["user_id"]) ) { ?>
                    <br>
                    <a href="editAction.php?id=<?= $action["id"]; ?>">Uredi akcijo</a>
                    <a href="deleteAction.php?id=<?= $action["id"]; ?>">Izbriši akcijo</a>
                <?php } ?>
            </div>
        <?php } ?>
        <?php
        $news = DB::queryOne("SELECT *, LEFT(text, 150) as izvlecek FROM news ORDER BY id DESC LIMIT 1");
        ?>
        <?php if ( !empty($news) ) { ?>
            <div class="col-sm-12 col-xs-12 <?php echo !empty($action) ? "col-md-6" : "" ?>">
                <h1 class="page-header action text-center">NOVICE</h1>
                <div class="media">
                    <div class="media-body">
                        <h3 class="action media-heading"><?= $news['title'] ?></h3>
                        <?= strip_tags($news['izvlecek']) . "..." ?>
                        <br/>
                        <a href="news.php?id=<?= $news['id'] ?>">Preberi več...</a>
                    </div>
                </div>
                <?php if ( !empty($_SESSION["user_id"]) ) { ?>
                    <a href="editNews.php?id=<?= $news["id"]; ?>">Uredi novico</a>
                    <a href="deleteNews.php?id=<?= $news["id"]; ?>">Izbriši novico</a>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="clearfix"></div>
        <h1 class="page-header text-center action">Nudimo vam</h1>
        <div class="col-lg-6">
            <ul class="list-group text-center">
                <li class="list-group-item"><a class="text-default" href="program.php#kavitacija">KAVITACIJA -
                        liposukcija brez noža</a></li>
                <li class="list-group-item"><a class="text-default" href="program.php#limfna">PRESOTERAPIJA - strojna
                        limfna dranaža</a></li>
                <li class="list-group-item">
                    <a class="text-default" href="program.php#elektrostim">ELEKTROSTIMULACIJA</a></li>
                <li class="list-group-item"><a class="text-default" href="program.php#radifrekvenca">RADIOFREKVENCA - za
                        napetost kože</a></li>
                <li class="list-group-item"><a class="text-default" href="program.php#bodywrap">BODYWRAPING</a></li>
                <li class="list-group-item"><a class="text-default" href="program.php#infra">INFRARDEČA TOPLOTA</a></li>
                <li class="list-group-item"><a class="text-default" href="services.php#pedikura">PEDIKURA</a></li>
            </ul>
        </div>
        <div class="col-lg-6">
            <ul class="text-center list-group">
                <li class="list-group-item"><a class="text-default" href="services.php#nega-obraza">NEGA OBRAZA</a></li>
                <li class="list-group-item"><a class="text-default" href="services.php#depilacija">DEPILACIJA</a></li>
                <li class="list-group-item"><a class="text-default" href="services.php#wax">BRAZILSKA ALI INTIMNA
                        DEPILACIJA</a></li>
                <li class="list-group-item"><a class="text-default" href="services.php#masaza">MASAŽA</a></li>
                <li class="list-group-item">
                    <a class="text-default" href="program.php#elektrolipoliza">ELEKTROLIPOLIZA</a></li>
                <li class="list-group-item"><a class="text-default" href="services.php">DRUGE KOZMETIČNE STORITVE</a>
                </li>
                <li class="list-group-item">DARILNI BONI za vaše prijatelje in vaše najbližje</li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
<?php include_once "footer.php"; ?>