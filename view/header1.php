<?php  
require_once "core/init.php";

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
		<a href="index.php" ><img class="logo-beautiful" src="img/LogoBeautifulMalang.png" alt="Logo Beautiful Malng"></a>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="indexExplore.php">Explore</a></li>
			<li><a href="maps5.php">Digital Maps</a></li>
			<li><a href="https://budpar.malangkota.go.id/">Web Disbudpar</a></li>
			<!-- <li><a href="socialMedia.php">Social Media</a></li> -->
			<li><a href="index.php#video">Contact</a></li>
		</ul>
	</div>