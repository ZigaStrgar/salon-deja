<?php include_once "header.php"; ?>
<div id="contact-info" class="block-flat">
    <div class="col-lg-3 col-xs-12">
        <h1 class="page-header">Kontakt</h1>
            <span>
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-map-marker fa-stack-1x"></i>
                </span>
                Tabor - Beograjska ulica 6
            </span>
        <br/>
        <br/>
            <span>
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-building-o fa-stack-1x"></i>
                </span>
                2000 Maribor
            </span>
        <br/>
        <br/>
            <span>
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-phone fa-stack-1x"></i>
                </span>
                02/331-42-19
            </span>
        <br/>
        <br/>
            <span>
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-at fa-stack-1x"></i>
                </span>
                <a href="mailto:info@salon-deja.si">info@salon-deja.si</a>
            </span>
    </div>
    <div class="col-lg-9 col-xs-12">
        <h1 class="page-header">Kako do nas</h1>

        <div id="googlemap" style="width: 100%; height: 400px;"></div>
    </div>
    <div class="clearfix"></div>
</div>
<script>
    function initialize() {
        var stylez = [
            {
                featureType: "all",
                elementType: "all",
                stylers: [
                    {saturation: -100} // <-- THIS
                ]
            }
        ];

        var mapOptions = {
            zoom: 19,
            center: new google.maps.LatLng(46.5478452, 15.6413995),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            scrollwheel: false,
            draggable: true,
            panControl: true,
            zoomControl: false
        };

        var map = new google.maps.Map(document.getElementById('googlemap'),
            mapOptions);

        var mapType = new google.maps.StyledMapType(stylez, {name: ""});
        map.mapTypes.set('', mapType);
        map.setMapTypeId('');

        var contentString = '<img src="assets/img/logo.png" height="50" />';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var companyImage = new google.maps.MarkerImage('assets/img/marker.png',
            new google.maps.Size(50, 50),
            new google.maps.Point(0, 0),
            new google.maps.Point(25, 25)
        );

        var companyPos = new google.maps.LatLng(46.5479363, 15.6416124);

        var companyMarker = new google.maps.Marker({
            position: companyPos,
            map: map,
            icon: "assets",
            title: "Kozmeticni salon Deja",
            zIndex: 3000
        });

        infowindow.open(map, companyMarker);
    }

    function loadScript() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp' +
        '&signed_in=true&callback=initialize';
        document.body.appendChild(script);
    }

    window.onload = loadScript;
</script>