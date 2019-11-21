<?php  
require_once "../functions/db.php"; 
require_once "../functions/functions.php"; 

$setting = tampilkan_settings();
?>

<head> 
	<link rel="icon" type="image/png" href="img/LogoBeautifulMalang.png">
	<title>Pariwisata Malang</title>
	<link rel="stylesheet" href="view/style1.css">
	<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"></link>

<!-- maps -->
   	<!-- <link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
   	<link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap.css">
   	<script type="text/javascript" src="assets/jquery-1.11.1.js"></script>
   	<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
   	</script> -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap.css">
 	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
 	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKN8E3VeLkA5mgeENXiKp9tjhPlQ95TPc&callback=initMap">
    </script> 
 -->
 
	<?php while ($row = mysqli_fetch_assoc($setting)): 
	/*die(print_r($row))*/ ?>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= $row['set_api']; ?>">
    </script>
    <?php endwhile; ?>
</head>

	<div class="navbar">
		
	</div>