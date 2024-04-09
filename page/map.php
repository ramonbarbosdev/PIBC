
<?php

include './config.php';


//Consultando tabela 
$sqls=mysqli_query($con,"SELECT * FROM `pontos`");



$data=array();
while($roww= mysqli_fetch_array($sqls)){
    $data[] = array("lat"=>$roww["latitude"], "lon"=>$roww["longitude"], "details"=>$roww['details']);
}

?>

<body>

  
            
            <div id="map" ></div>
           

  

<!--heatmap-->
<script src="dist/leaflet-heat.js"></script>

<!--Dados de calor-->
<script src="js/dados.js"></script>


    <script>



            let h2 = document.querySelector('h2');
            var map;

            function success(pos){
                console.log("Localização atual: "+pos.coords.latitude, pos.coords.longitude);
                h2.textContent = `Informações de Vazamento em Salvador`;
                //h2.textContent = `Latitude: ${pos.coords.latitude}, Longitude: ${pos.coords.longitude}`;



                //Condição para mudar de posição sem dar erro
                if(map === undefined){
                    map = L.map('map').setView([-12.9777125, -38.4713629], 15);

                }else{
                    map.remove();
                    map = L.map('map').setView([-12.9777125, -38.4713629], 15);

                }

                    //Renderiza o mapa
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap'
                }).addTo(map);


            //geojeson data



                const geojsonMarkerOptions = {
                    radius: 8,
                    fillColor: "#ff7800",
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 0.8,
                };

                var dados = [{
                    "type": "Feature",
                    "properties": {
                        "name": "Coors Field",
                        "amenity": "Baseball Stadium",
                        "popupContent": "This is where the Rockies play!"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-38.456569, -12.978306 ],
                    }
                },
                {
                    "type": "Feature",
                    "properties": {
                        "name": "Coors Field",
                        "amenity": "Baseball Stadium",
                        "popupContent": "This is where the Rockies play!"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-38.4544, -12.981777 ],
                    }
                },
                {
                    "type": "Feature",
                    "properties": {
                        "name": "Coors Field",
                        "amenity": "Baseball Stadium",
                        "popupContent": "This is where the Rockies play!"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-38.454432, -12.979646 ], 


                    }
                },
                {
                    "type": "Feature",
                    "properties": {
                        "name": "Coors Field",
                        "amenity": "Baseball Stadium",
                        "popupContent": "This is where the Rockies play!"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-38.451488, -12.979090 ], 


                    }
                },
            ];

            
            
             

              var city = L.markerClusterGroup();

                var data = <?php echo json_encode($data); ?>;

                for (var i = 0; i < data.length; i++) {
                var new_location = new L.LatLng(data[i].lat, data[i].lon);
                var place = data[i].details;
                var marker = new L.Marker(new_location, {
                    title: place
                });

                var message = 'Localização: ' +place;

                marker.bindPopup(message);

                city.addLayer(marker);

                }

                map.addLayer(city);

        
            //CLUSTER  HEAT
            
            //   L.geoJSON(data, {
            //         pointToLayer: function (feature, latlng) {
            //             return  markers.addLayer(L.circleMarker(latlng, geojsonMarkerOptions)) ;
            //             //return L.circleMarker(latlng, geojsonMarkerOptions)
            //         }

            //     }).addTo(map);

            //     addressPoints = addressPoints.map(function (p) { return [p[0], p[1]]; });

            //     var heat = L.heatLayer(addressPoints).addTo(map);

            //     map.addLayer(markers);
                

            }//final da função

            function error(err){
                console.log(err);
            }


            var watchID = navigator.geolocation.watchPosition(success, error, {
                enableHighAccuracy:true,
                timeout: 5000
            })


            


    </script>


</body>
