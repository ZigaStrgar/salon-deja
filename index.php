<?php include_once "header.php"; ?>
    <div class="block-flat">
        <img src="./assets/img/naslovna.jpg" alt="Naslovna slika" class="img-responsive" style="margin: 0 auto;"/>

        <h3 class="text-center action">Prepustite se razvajanju v Kozmetičnem salonu Deja, da se boste počutile še lepše
            in samozavestnejše</h3>

        <div class="clearifx"></div>
        <h1 class="page-header action text-center">NOVO V PONUDBI</h1>

        <h3 class="text-center">PODALJŠEVANJE IN ZGOSTITEV TREPALNIC</h3>

        <p>
            <b>Si od nekdaj želite dolge in ukrivljene trepalnice kot jih imajo zvezde?</b> Ali si enostavno želite, da
            bi se lahko sproščeno ukvarjali s športom in ob tem ohranili urejen videz? Morda pa bi radi le polepšali
            obliko oči?
            Z Xtreme Lashes trepalnicami zlahka dosežete vse to!
        </p>

        <p>
            Xtreme Lashes je revolucionaren način podaljševanja trepalnic, s katerim si boste na popolnoma varen in
            zdravju popolnoma neškodljiv način zagotovili daljše, gostejše in privlačnejše trepalnice. Na vaše
            trepalnice se nanašajo ročno, in sicer na vsako trepalnico posebej, kar zagotavlja vrhunsko kvaliteto,
            naraven videz in lahkoten občutek.
        </p>

        <p>
            Xtreme Lashes stilist uporablja le visoko kakovostne materiale, ki so zdravju 100 % prijazni. Zaradi
            postopka nanosa so podaljšane trepalnice Xtreme Lashes primerne tudi za tiste, ki običajnih umetnih
            trepalnic ne prenašajo dobro.
        </p>
        <?php
        $action = Db::queryOne("SELECT * FROM actions ORDER BY valid DESC LIMIT 1");
        ?>
        <?php if ( ! empty($action) ) { ?>
            <h1 class="page-header action text-center">AKCIJA</h1>
            <p>
                <?= $action["text"]; ?>
            </p>
            <small class="text-muted">Akcija velja do: <?= date("d. m. Y", strtotime($action["valid"])) ?></small>
            <?php if ( ! empty($_SESSION["user_id"]) ) { ?>
                <br>
                <a href="editAction.php?id=<?= $action["id"]; ?>">Uredi akcijo</a>
                <a href="deleteAction.php?id=<?= $action["id"]; ?>">Izbriši akcijo</a>
            <?php } ?>
        <?php } ?>
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
                <li class="list-group-item"><a class="text-default" href="services.php#trepalnice">PODALJŠEVANJE IN ZGOSTITEV TREPALNIC</a></li>
            </ul>
        </div>
        <div class="col-lg-6">
            <ul class="text-center list-group">
                <li class="list-group-item"><a class="text-default" href="services.php#masaza-stopal">REFLEKSNA MASAŽA
                        STOPAL</a></li>
                <li class="list-group-item"><a class="text-default" href="services.php#nega-obraza">NEGA OBRAZA</a></li>
                <li class="list-group-item"><a class="text-default" href="services.php#depilacija">DEPILACIJA</a></li>
                <li class="list-group-item"><a class="text-default" href="services.php#wax">BRAZILSKA ALI INTIMNA
                        DEPILACIJA</a></li>
                <li class="list-group-item"><a class="text-default" href="services.php#masaza">MASAŽA</a></li>
                <li class="list-group-item"><a class="text-default" href="services.php">DRUGE KOZMETIČNE STORITVE</a>
                </li>
                <li class="list-group-item">DARILNI BONI za vaše prijatelje in vaše najbližje</li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
<?php include_once "footer.php"; ?>