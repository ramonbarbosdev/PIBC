
<body>

  
            
<div id="map" ></div>

<!--heatmap-->
<script src="dist/leaflet-heat.js"></script>

<!--Dados de calor-->
<script src="js/dados.js"></script>

<!--
<script src="http://leaflet.github.io/Leaflet.markercluster/example/realworld.10000.js"></script> -->

<script>

    var map = L.map('map').setView([-12.979202, -38.452604], 15);

    

var tiles = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

addressPoints = addressPoints.map(function (p) { return [p[0], p[1]]; });

var heat = L.heatLayer(addressPoints).addTo(map);

</script>


</body>
