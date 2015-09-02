</div>
</div>
<footer class="container" style="padding-bottom: 15px; margin-top: -40px;">
    <div class="col-lg-3 col-md-12 text-center">
        <h4 class="page-header text-center">Kontakt</h4>
        Kozmetični salon Deja <br/>
        Tabor - Beograjska ulica 6a <br/>
        2000 Maribor<br/>
        02/331-42-19<br/>
        <a href="mailto:info@salon-deja.si">info@salon-deja.si</a>
    </div>
    <div class="col-lg-6 col-md-12">
        <h4 class="page-header text-center">Kako do nas</h4>
        <div id="googlemapfooter" style="width: 100%; height: 200px;"></div>
    </div>
    <?php
    $hours = Db::queryAll("SELECT * FROM hours ORDER BY id ASC");
    ?>
    <div class="col-lg-3 col-md-12 text-center">
        <h4 class="page-header text-center">Delovni čas</h4>
        <table class="table-condensed table-bordered table-striped text-center col-xs-12">
        <?php
        foreach($hours as $hour):
            ?>
            <tr>
                <td>
                    <?= $hour["name"] ?>
                </td>
                <td>
                    <?= $hour["text"] ?>
                </td>
            </tr>
            <?php
        endforeach;
        ?>
        </table>
    </div>
    <div style="margin: 10px 0 -5px;" class="center-block text-center col-xs-12 text-muted">
        Salon Deja © 2015&nbsp;&nbsp;•&nbsp;&nbsp;Izdelava <a href="http://zigastrgar.com" target="_blank">Žiga Strgar</a>
    </div>
</footer>
<div id="totop">
    <i class="fa fa-angle-up fa-2x"></i>
</div>
<div id="cookies" style="display: none;">
    Stran uporablja piškote
    <div class="cookie-buttons">
        <span class="btn btn-flat btn-success accept">Sprejmi</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
            class="btn btn-danger btn-flat decline">Zavrni</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
            href="cookies.php" class="color-info no-hover">Preberi več</a>
    </div>
</div>
<script src="./assets/js/custom.min.js" type="text/javascript"></script>
<script async src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
<script async src="./vendor/alertify/alertify.min.js" type="text/javascript"></script>
<script src="./vendor/sticky/jquery.sticky.min.js" type="text/javascript"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCg87OoJVwps11kXbw0QCTSac7DtKWDIHM&callback=loadmap">
</script>
</body>
</html>