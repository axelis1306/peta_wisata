 <?php  
require_once "core/init.php";
require_once "view/header1.php";

$error= '';
$setting = tampilkan_settings();
//mengambil isi data berdasarkan id
$id= $_GET['artikel_id'];

if (isset($_GET['artikel_id'])) {
	$article = tampilkan_per_id($id);
	while($row = mysqli_fetch_assoc($article)){
		$title = $row['artikel_judul'];
		$alamat = $row['artikel_alamat'];
		$description = $row['artikel_isi'];
		$buka = $row['artikel_buka'];
		$tiket = $row['artikel_tiket'];
		$upload = $row['artikel_gambar'];
		
	}
}
 ?>
<div>
<div class="artikell">

<div class="isi">
<p id="title">
	<?=$title; ?>
</p>
<p id="alamat">
	<i class="fa fa-map-marker"></i>
    &nbsp;&nbsp;
	<?=$alamat; ?>	
</p>


<body>
	

<div class="menu-left">
			<p><?="<img src='img/".$upload."'style='width:550px; '>"?></td></p>
		<p>
		</div>

<div class="menu-right">


<p id="buka">
	<i class="fa fa-clock-o"></i>
    &nbsp;
	<?=$buka; ?>
</p>
<p id="tiket">
	<i class="fa fa-ticket"></i>
    &nbsp;
	<?=$tiket; ?>
</p>

</div>



<!-- <p id="description">
	<?=$description; ?>
</p> -->
<div class="description2">
	<?=$description; ?>
</div>
</div>


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="ilmu-detil.blogspot.com">
	<title>Multi Marker Map </title>
	<!-- Bagian css -->
	<!-- <link rel="stylesheet" href="view/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="view/css/ilmudetil.css">
	
	<!-- Bagian js -->
	<!-- <script src='view/js/jquery-1.10.1.min.js'></script>       
    
	<script src="view/js/bootstrap.min.js"></script> -->
	<!-- akhir dari Bagian js -->
	<!-- <script src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
	
	<script>
		
    var marker;
      function initialize() {
		  
		// Variabel untuk menyimpan informasi (desc)
		var infoWindow = new google.maps.InfoWindow;
		
		//  Variabel untuk menyimpan peta Roadmap
		
        <?php while ($row = mysqli_fetch_assoc($setting)): /*die(print_r($row))*/ ?>
        var mapOptions = {
        	center: {lat: <?= $row['set_lat']; ?>, lng: <?= $row['set_long']; ?>},
          zoom:<?= $row['set_zoom']; ?>,
          
            mapTypeId: google.maps.MapTypeId.ROADMAP
          
        };
         <?php endwhile; ?>

		// Pembuatan petanya
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
              
        // Variabel untuk menyimpan batas kordinat
		var bounds = new google.maps.LatLngBounds();



		// Pengambilan data dari database
		<?php

		$id= $_GET['artikel_id'];

if (isset($_GET['artikel_id'])) {
	$article = tampilkan_per_id($id);
	while($data = mysqli_fetch_assoc($article)){

				$title = $data['artikel_judul'];
				$lat = $data['artikel_lat'];
				$long = $data['artikel_long'];
				
				echo ("addMarker($lat, $long, '<b>$title</b>');\n");                        
			}}
          ?>

 
		  
		// Proses membuat marker 
		function addMarker(lat, lng, info) {
			var lokasi = new google.maps.LatLng(lat, lng);
			bounds.extend(lokasi);
			var marker = new google.maps.Marker({
				map: map,
				position: lokasi
			});       
			map.fitBounds(bounds);
			bindInfoWindow(marker, map, infoWindow, info);
		 }
		
		// Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    
	</script>
	
</head>
<body onload="initialize()">

<!--- Bagian Judul-->	
<div class="container" style="margin-top:70px">	

	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<!-- <div class="panel-heading"><?=$title; ?></div> -->
					<div class="panel-body">
						<div id="map-canvas" style="
						border-bottom: 3px solid #AED6F2;
          				border-top: 3px solid #AED6F2; 
						width: 1150px; 
						height: 350px;">
						
						</div>
					</div>
			</div>
		</div>	
	</div>
</div>	
</body>



</div>



 <?php 
require_once "view/footer.php";
  ?>
