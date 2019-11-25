<?php 
session_start();  
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}

include "./templates/top.php"; 

?>
 
<?php include "./templates/navbar.php"; ?>

<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <h2>Digital Maps</h2>
      <div class="table-responsive">
         <table class="table table-striped table-sm">
          <thead>
            <tr>
                <th>
        <?php  
require_once "../functions/db.php"; 
require_once "../functions/functions.php"; 
require_once "../view/header2.php";


$articles = tampilkan();
// die(print_r($articles));

$setting = tampilkan_settings();

//menampilkan yg dicari
if (isset($_GET['cari'])) {
  // get cari yg ada di url
  $cari = $_GET['cari'];
  $articles = hasil_cari($cari);
}

if (isset($_GET['id'])) {
  // get cari yg ada di url
  $id = $_GET['id'];
  $articles = tampilkan_per_kategory_id($id);
}
 ?>





<style type="text/css">
  .gm-style-iw {color: #000000;margin: 0 0 0 0}
  .gmnoprint div {color: #000000;}

  /*maps*/
  #content h1{
  text-decoration: none;
  color: #AED6F2;
  text-shadow: 2px 2px 1px black;
  font-family: 'Acme', sans-serif;
}

#content i{
  text-decoration: none;
  color: black;
}
</style>
<script type="text/javascript">
    function initMap() {
      var map;
      var geocoder = new google.maps.Geocoder;
      markerBaru = [];
      var styleGMaps = [
  {
    "featureType": "road.local",
    "elementType": "geometry",
    "stylers": [
      { "visibility": "on" },
      { "invert_lightness": true },
      { "gamma": 1.96 },
      { "lightness": -65 },
      { "saturation": 53 },
      { "hue": "#00e5ff" },
      { "weight": 0.2 },
      { "color": "#dd6630" }
    ]
  },{
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      { "invert_lightness": true },
      { "lightness": 33 },
      { "gamma": 0.84 },
      { "hue": "#0008ff" },
      { "visibility": "on" },
      { "saturation": 38 },
      { "weight": 2.2 },
      { "color": "#4f90f4" }
    ]
  },{
    "featureType": "road.arterial",
    "elementType": "geometry.fill",
    "stylers": [
      { "visibility": "on" },
      { "invert_lightness": true },
      { "color": "#ffb147" },
      { "saturation": 23 },
      { "hue": "#ff9100" },
      { "lightness": -30 },
      { "gamma": 4.09 },
      { "weight": 2.1 }
    ]
  },{
    "featureType": "landscape.natural",
    "elementType": "geometry.fill",
    "stylers": [
      { "visibility": "on" },
      { "lightness": -14 },
      { "color": "#5cae8e" },
      { "weight": 0.4 },
      { "saturation": 34 },
      { "gamma": 1.42 }
    ]
  }
];

      var styled = new google.maps.StyledMapType(styleGMaps,
        {name: "Styled Map"});

      
        
      <?php while ($row = mysqli_fetch_assoc($setting)): /*die(print_r($row))*/ ?>
        
      var mapOptions = {
          center: {lat: <?= $row['set_lat']; ?>, lng: <?= $row['set_long']; ?>},
          zoom:<?= $row['set_zoom']; ?>,
          mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
          },
          mapTypeControl: false,
          zoomControl: false,
          scaleControl: false,
          streetViewControl: false,
          rotateControl: false,
          fullscreenControl: false
        };
            <?php endwhile; ?>
            

      var mapAwal = {
          center: {lat: 0.5163256, lng: 101.4437629},
          zoom: 12 ,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      map = new google.maps.Map(document.getElementById('map'),mapOptions);
      map.mapTypes.set('map_style', styled);
      map.setMapTypeId('map_style');
      var infoWindow = new google.maps.InfoWindow;

      downloadUrl("../koordinat.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var lat = parseFloat(markers[i].getAttribute("b"));
          var long = parseFloat(markers[i].getAttribute("c"));
          var id = markers[i].getAttribute("a");
          var title = markers[i].getAttribute("d");
          var icon = markers[i].getAttribute("e");
          var upload = markers[i].getAttribute("f");
          var upload = '../img/'+upload+'' || {};
          var alamat = markers[i].getAttribute("g");
          var buka = markers[i].getAttribute("h");
          var tiket = markers[i].getAttribute("i");
          var icon = '../img/'+icon+'' || {};
          var marker = new google.maps.Marker({
            map: map,
            position: {lat:lat,lng:long},
            icon: icon,
          }); 

          var contentString = 

          '<div id="content">'+
      '<h1>'+title+'</h1>'+

      '<i class="fa fa-map-marker">&nbsp;&nbsp;'+alamat+'</i><br>'+

      '<img width="300px" src="'+upload+'">'+'<br>'+

      '<i class="fa fa-clock-o">&nbsp;&nbsp;'+buka+'</i><br>'+

      '<i class="fa fa-ticket">&nbsp;&nbsp;'+tiket+'</i>'
      '</div>';

   bindInfoWindow(marker, map, infoWindow, contentString);
        }
      });

      document.getElementById('cariLokasi').addEventListener('click', function() {
          cariLokasi();
      });

        function cariLokasi() {
          setMapOnAll(null);
          var input = document.getElementById('cari_lokasi').value;
          var latlngStr = input.split(',', 4);
          var posisi = new google.maps.LatLng(latlngStr[2], latlngStr[3]);
          var lokasiMarker = latlngStr[0];
          geocoder.geocode({'location': posisi}, function(results, status) {

              if (lokasiMarker) {
                map.setCenter(posisi)
                downloadUrl("koordinatCari.php?artikel_id="+lokasiMarker, function(data) {
                  var xml = data.responseXML;
                  var markers = xml.documentElement.getElementsByTagName("marker");
                    var lat = parseFloat(markers[0].getAttribute("b"));
          var long = parseFloat(markers[0].getAttribute("c"));
          var id = markers[0].getAttribute("a");
          var title = markers[0].getAttribute("d");
        
          var upload = markers[0].getAttribute("f");
          var upload = 'img/'+upload+'' || {};
          var alamat = markers[0].getAttribute("g");
          var buka = markers[0].getAttribute("h");
          var tiket = markers[0].getAttribute("i");
       
                    // var icon = markers[0].getAttribute("e");
                    // var icon = 'public/img/'+icon+'' || {};
                    // var icon = 'public/img/3.png';

                    var marker = new google.maps.Marker({
                      map: map,
                      position: {lat:lat,lng:long},
                      icon: "http://icons.iconarchive.com/icons/paomedia/small-n-flat/48/map-marker-icon.png",
                    });

                    var contentString = 

          
          '<div id="content">'+
      '<h1><a href="single3.php?artikel_id='+id+'">'+title+'</h1>'+

      '<i class="fa fa-map-marker">&nbsp;&nbsp;'+alamat+'</i><br>'+

      '<img width="300px" src="'+upload+'">'+'<br>'+

      '<i class="fa fa-clock-o">&nbsp;&nbsp;'+buka+'</i><br>'+

      '<i class="fa fa-ticket">&nbsp;&nbsp;'+tiket+'</i>'
      '</div>';

                    bindInfoWindow(marker, map, infoWindow, contentString);
                });
              } else {
                  window.alert('Tidak ada hasil');
                }

          });
      }

        

     function bindInfoWindow(marker, map, infoWindow, contentString) {
       markerBaru.push(marker);
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(contentString);
        
        infoWindow.open(map, marker);
      });
    }

    function setMapOnAll(map) {
            for (var i = 0; i < markerBaru.length; i++) {
              markerBaru[i].setMap(map);
            }
          }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;


      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }
}

   function doNothing() {}
</script>
<script>
$(document).ready(function() {
    $('#cari_lokasi').autocomplete({
        source: 'jsonCari.php'
    });
    $("#refresh").click(function() {
       $("#map").load("homeMaps6.php")
    });
})
</script>


  
  











      
          <div id="map" style="
          border-bottom: 3px solid #AED6F2;
          border-top: 3px solid #AED6F2; 
          margin-left: 0%; 
          margin-bottom: 40px; 
          width: 100%;
          height:500px" ></div>
        </div>






      </div>
    </main>
  </div>
</div>

<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/admin.js"></script>
