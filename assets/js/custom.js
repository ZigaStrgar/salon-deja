$(document).ready(function () {
    //AJAX FROM
    $(".ajaxForm").on("submit", function () {
        //Pregleda osnovne elemente obrazca
        var $this = $(this),
            url = $this.attr('action'), //URL kam naj se pošljejo podatki
            method = $this.attr('method'), //Metoda za pošiljanje podatkov (POST, GET)
            data = {}; //Tabela, ki sprejme podatke za pošiljanje

        //Funkcija, ki pogleda vse elemente obrazca in jih nato shrani v tabelo data
        $this.find('[name]').each(function (index, value) {
            var $this = $(this),
                name = $this.attr('name'), //Ime, ki ga sprejme $_POST["name"]
                value = $this.val(); //Vrednost $_POST["name"]
            if (name === 'redirect') {
                $redirect = value; //Kam te preusmeri funkcija, če je pošiljanje forme uspešno in se v formi pošlje lokacija
            } else {
                $redirect = "";
            }
            data[name] = value; //Tabela se polni s podatki
        });
        $.ajax({
            url: url,
            type: method,
            data: data,
            beforeSend: function () {
                $("#loading").removeClass("hide");
            },
            success: function (comeback) {
                $("#loading").addClass("hide");
                comeback = $.trim(comeback);
                comeback = comeback.split("|");
                if (comeback[0] === "success") { //Izpis če je nekaj bilo uspešno
                    if (data["clear"] == 1) { //Počisti vse inpute ob uspešni akciji
                        $.each(data, function (index, value) {
                            $("[name=" + index + "]").val("");
                        });
                    }
                    if (data["refresh"] == 1) {
                        window.location.reload();
                    }
                    alertify.success(comeback[1]);
                } else if (comeback[0] === "redirect") { //Preusmeritev
                    if ($redirect === "") {
                        window.location.href = comeback[1];
                    } else {
                        window.location.href = $redirect;
                    }
                } else if (comeback[0] === "error") { //Error
                    alertify.error(comeback[1]);
                }
            }
        });
        return false;
    });
//END AJAX FORM
});

//GOOGLE MAPS
function loadmap() {
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
        zoom: 18,
        center: new google.maps.LatLng(46.5477663, 15.6416426),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        scrollwheel: false,
        draggable: true,
        panControl: true,
        zoomControl: true
    };

    var map = new google.maps.Map(document.getElementById('googlemapfooter'),
        mapOptions);

    var mapType = new google.maps.StyledMapType(stylez, {name: ""});
    map.mapTypes.set('', mapType);
    map.setMapTypeId('');

    var contentString = '<img src="assets/img/logo.png" height="50" /><br />Brezplačno parkiranje';

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

    if (location.href.indexOf("contact.php") !== -1) {
        contactmap();
    }
}

function contactmap() {
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
        center: new google.maps.LatLng(46.5477663, 15.6416426),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        scrollwheel: false,
        draggable: true,
        panControl: true,
        zoomControl: true
    };

    var map = new google.maps.Map(document.getElementById('googlemap'),
        mapOptions);

    var mapType = new google.maps.StyledMapType(stylez, {name: ""});
    map.mapTypes.set('', mapType);
    map.setMapTypeId('');

    var contentString = '<img src="assets/img/logo.png" height="50" /><br />Brezplačno parkiranje';

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

window.onload = loadmap;
//END GOOGLE MAPS

//LOGOUT
window.addEventListener('storage', onStorageEvent, false);

function onStorageEvent(storageEvent) {
    if (storageEvent.key === "logout") {
        location.reload();
    }
}
//END LOGOUT

//TO TOP
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 105) {
            $('#totop').fadeIn();
        } else {
            $('#totop').fadeOut();
        }
    });
    $('#totop').click(function () {
        $("html, body").animate({scrollTop: 0}, 400);
        return false;
    });
});
//END TO TOP

//COOKIES
$(document).ready(function () {
    if (localStorage.getItem("cookies") === null) {
        $("#cookies").show();
        $("footer").css({"margin-bottom": "100px"});
    } else {
        $("#cookies").hide();
        $("footer").css({"margin-bottom": "0px"});
    }

    $(document).on("click", ".accept", function () {
        $("#cookies").hide();
        $(".state").show();
        $(".state2").show();
        localStorage.setItem("cookies", "1");
        $(".cookie-state").html("<span class='color-success'>Sprejeli</span>");
        $("footer").css({"margin-bottom": "0px"});
    });

    $(document).on("click", ".decline", function () {
        $("#cookies").hide();
        $(".state").show();
        $(".state2").show();
        localStorage.setItem("cookies", "0");
        $(".cookie-state").html("<span class='color-danger'>Zavrnili</span>");
        $("footer").css({"margin-bottom": "0px"});
    });

    $(document).on("click", "#reset", function () {
        localStorage.removeItem("cookies");
        $(".state").hide();
        $(".state2").hide();
        $("#cookies").show();
        $("footer").css({"margin-bottom": "100px"});
    });
});
//END COOKIES

//DYNAMIC TITLE
$(document).ready(function () {
    var company = "Salon Deja";
    var page = $("h1:first").text();
    $("title").text(company + " - " + page);
});
//END DYNAMIC TITLE