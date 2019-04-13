<!DOCTYPE html>
<html>
<head>
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
    </style>
    <script
        src="https://code.jquery.com/jquery-3.4.0.js"
        integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
        crossorigin="anonymous"></script>
</head>
<body>
<h3>My Google Maps Demo</h3>
Address: <input id="address"> <a href="javascript:void(0);" onclick="return getLatLang();">Get Lat & Lang</a>
<!--The div element for the map -->
<div id="map"></div>
<script>
    var locations = [
        {lat: -31.563910, lng: 147.154312},
        {lat: -33.718234, lng: 150.363181},
        {lat: -33.727111, lng: 150.371124},
        {lat: -33.848588, lng: 151.209834},
        {lat: -33.851702, lng: 151.216968},
        {lat: -34.671264, lng: 150.863657},
        {lat: -35.304724, lng: 148.662905},
        {lat: -36.817685, lng: 175.699196},
        {lat: -36.828611, lng: 175.790222},
        {lat: -37.750000, lng: 145.116667},
        {lat: -37.759859, lng: 145.128708},
        {lat: -37.765015, lng: 145.133858},
        {lat: -37.770104, lng: 145.143299},
        {lat: -37.773700, lng: 145.145187},
        {lat: -37.774785, lng: 145.137978},
        {lat: -37.819616, lng: 144.968119},
        {lat: -38.330766, lng: 144.695692},
        {lat: -39.927193, lng: 175.053218},
        {lat: -41.330162, lng: 174.865694},
        {lat: -42.734358, lng: 147.439506},
        {lat: -42.734358, lng: 147.501315},
        {lat: -42.735258, lng: 147.438000},
        {lat: -43.999792, lng: 170.463352}
    ];
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var uluru = {lat: -25.344, lng: 131.036};
        // The map, centered at Uluru
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });

        // The marker, positioned at Uluru
        $.each(locations, function (key, value) {
            var marker = new google.maps.Marker({position: value, map: map});
        });
    }

    function getLatLang() {
        var address = $('#address').val();
        $.ajax({
            url: 'https://maps.googleapis.com/maps/api/geocode/json?address=' + address + '&key=AIzaSyA3xfGlpR0kHJ3wlU5DJmQnbw5hlz9QSVs',
            method: 'GET',
            success: function (response) {
                var lat = response.results[0].geometry.location.lat;
                var lng = response.results[0].geometry.location.lng;
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: {lat, lng}
                });
                var marker = new google.maps.Marker({
                    position: {lat, lng},
                    map: map
                });

                $.each(locations, function (key, value) {
                    var marker = new google.maps.Marker({position: value, map: map});
                });
            }
        });
    }
</script>
<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3xfGlpR0kHJ3wlU5DJmQnbw5hlz9QSVs&callback=initMap">
</script>
</body>
</html>