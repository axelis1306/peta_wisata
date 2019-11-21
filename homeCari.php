<style type="text/css">
  .gm-style-iw {color: #000000;margin: 0 0 0 0}
  .gmnoprint div {color: #000000;}
</style>
<script type="text/javascript">
    function initMap() {
      var map1;
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

      var mapOptions = {
          center: {lat: 0.5163256, lng: 101.4437629},
          zoom:12,
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

        var mapAwal = {
            center: {lat: 0.5163256, lng: 101.4437629},
            zoom: 12 ,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map1'),mapOptions);
        map.mapTypes.set('map_style', styled);
        map.setMapTypeId('map_style');
        var infoWindow = new google.maps.InfoWindow;
        downloadUrl("koordinat.php", function(data) {
          var xml = data.responseXML;
          var markers = xml.documentElement.getElementsByTagName("marker");
          for (var i = 0; i < markers.length; i++) {
            var latitude = parseFloat(markers[i].getAttribute("b"));
            var longitude = parseFloat(markers[i].getAttribute("c"));
            var keterangan = markers[i].getAttribute("d");
            var kategori = markers[i].getAttribute("e");
            var icon = 'assets/'+kategori+'.png' || {};
            var marker = new google.maps.Marker({
              map: map,
              position: {lat:latitude,lng:longitude},
              icon: icon,
            });
            bindInfoWindow(marker, map, infoWindow, keterangan);
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
            if (status == google.maps.GeocoderStatus.OK) {
              if (results[1]) {
                map.setCenter(posisi)
                downloadUrl("koordinat_cari.php?id="+lokasiMarker, function(data) {
                  var xml = data.responseXML;
                  var markers = xml.documentElement.getElementsByTagName("marker");
                    var latitude = parseFloat(markers[0].getAttribute("b"));
                    var longitude = parseFloat(markers[0].getAttribute("c"));
                    var keterangan = markers[0].getAttribute("d");
                    var kategori = markers[0].getAttribute("e");
                    var icon = 'assets/images/CARI.png' || {};
                    var marker = new google.maps.Marker({
                      map: map,
                      position: {lat:latitude,lng:longitude},
                      icon: icon,
                    });
                    bindInfoWindow(marker, map, infoWindow, keterangan);
                });
              } else {
                  window.alert('Tidak ada hasil');
                }
            } else {
              window.alert('Pencarian tidak lengkap, silahkan pilih berdasarkan data yang ditampilkannJANGAN LUPA FOLLOW : www.java-sc.com');
            }
          });
        }

      function bindInfoWindow(marker, map, infoWindow, keterangan) {
        markerBaru.push(marker);
        google.maps.event.addListener(marker, 'click', function() {
          infoWindow.setContent(keterangan);
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
        source: 'json_cari.php'
    });
    $("#refresh").click(function() {
       $("#map1").load("index.php")
    });
})
</script>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-heading">
            <center><h4>LOKASI PELAYANAN UMUM DI KOTA PEKANBARU</h4></center>
        </div>
        <div class="panel-body">
          <div class="col-md-4">
            <input type="text" class="form-control" name="cari_lokasi" id="cari_lokasi" placeholder="Cari Lokasi Disini"/>
          </div>
          <div class="col-md-2">
            <buttons class="btn btn-primary" id="cariLokasi">Cari Lokasi</button>
          </div>
          <div class="col-md-5">
              <a href="index.php?page=kelola" class="btn btn-warning">Halaman Kelola</a>&nbsp
              <a href="#" class="btn btn-danger" id="refresh">Refresh Maps</a>
          </div>
      </br>
        </br>
          <div id="map1" style="width:100%;height:450px" ></div>
        </div>
    </div>
  </div>
</div>