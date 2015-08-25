</div>
</div>
<footer class="container" style="margin-bottom: 15px; margin-top: -40px;">
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
        <div id="googlemapfooter" style="width: 100%; height: 200px;5"></div>
    </div>
    <div class="col-lg-3 col-md-12 text-center">
        <h4 class="page-header text-center">Delovni čas</h4>
        Pon.: 12<sup>00</sup> - 20<sup>00</sup><br/>
        Tor.: 12<sup>00</sup> - 20<sup>00</sup><br/>
        Sre.: 8<sup>00</sup> - 16<sup>00</sup><br/>
        Čet.: 12<sup>00</sup> - 20<sup>00</sup><br/>
        Pet.: 8<sup>00</sup> - 16<sup>00</sup><br/>
        Sob.: Po dogovoru
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
<script src="./assets/js/custom.js" type="text/javascript"></script>
<script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./vendor/alertify/alertify.js" type="text/javascript"></script>
<script src="./vendor/sticky/jquery.sticky.js" type="text/javascript"></script>
<script>
    function loadScript() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp' +
        '&signed_in=true&callback=loadmap';
        document.body.appendChild(script);
    }

    window.onload = loadScript;
    $(document).ready(function () {
        $(".navbar").sticky({topSpacing: 0});
    });
</script>
</body>
</html>