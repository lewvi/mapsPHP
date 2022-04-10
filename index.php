<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />

    <!-- bar -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Simple Map</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div id="map"></div>
    </div>
    <script>
        function initMap() {

            const mapsOpition = {
                zoom : 13,
                center:{ lat: 13.736717, lng: 100.523186 }
            }

            const maps = new google.maps.Map(document.getElementById("map"),mapsOpition);

            var marker, info;

            $.getJSON("data.php", function(jsonObj) {
                $.each(jsonObj, function(i, item) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(item.lat,item.lng),
                        map : maps
                    });

                    info = new google.maps.InfoWindow();

                    google.maps.event.addListener(marker,"click", (function(marker, i) {
                        return function() {
                            info.setContent(item.name)
                            info.open(maps, marker)
                        }
                    })(marker, i));
                })
            })
        }
    </script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj0wbyyUR8g3Kg_whJgEPUD05hRq2qnW4&callback=initMap&v=weekly"></script>
</body>
</html>