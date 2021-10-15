<script>


mapboxgl.accessToken = 'pk.eyJ1IjoiaWN0bmV0d29yayIsImEiOiJjazhmYWxjZ2owMmNjM2Zxb2dhZjhjd3Q4In0.ZM_7MtHwg77lRI02yeN4Og';
var map = new mapboxgl.Map({
	container: 'map', // container id
	style: 'mapbox://styles/mapbox/streets-v11',
	//center: [1.55, 37.8], // starting position
	zoom: 3 // starting zoom
});
var myLayer = mapboxgl.featureLayer().addTo(map);
// This uses the HTML5 geolocation API, which is available on
// most mobile browsers and modern browsers, but not in Internet Explorer
//
// See this chart of compatibility for details:
// http://caniuse.com/#feat=geolocation
if (!navigator.geolocation) {
    geolocate.innerHTML = 'Geolocation is not available';
} else {
      map.locate();
}

// Once we've got a position, zoom and center the map
// on it, and add a single marker.
map.on('locationfound', function(e) {
    map.fitBounds(e.bounds);

    myLayer.setGeoJSON({
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [e.latlng.lng, e.latlng.lat]
        },
        properties: {
            'title': 'Here I am!',
            'marker-color': '#ff8888',
            'marker-symbol': 'star'
        }
    });

    // And hide the geolocation button
    geolocate.parentNode.removeChild(geolocate);
});

// If the user chooses not to allow their location
// to be shared, display an error message.
map.on('locationerror', function() {
    geolocate.innerHTML = 'Position could not be found';
});
</script>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiaWN0bmV0d29yayIsImEiOiJjazhmYWxjZ2owMmNjM2Zxb2dhZjhjd3Q4In0.ZM_7MtHwg77lRI02yeN4Og';
var map = new mapboxgl.Map({
	container: 'map', // container id
	style: 'mapbox://styles/mapbox/streets-v11',
	center: [1.55, 37.8], // starting position
	zoom: 3 // starting zoom
});

</script>