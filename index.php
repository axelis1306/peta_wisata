<?php  
require_once "core/init.php";

$kategori = tampilkan_kategori();
// die(print_r($kategori));
?>


<head> 
	<link rel="icon" type="image/png" href="img/LogoBeautifulMalang.png">
	<title>Pariwisata Malang</title> 
	<link rel="stylesheet" href="view/style1.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cookie&display=swap" rel="stylesheet">

	<style>
		body {
 			margin: 0;

		}

		#navbar{
			width: 84%;
			left: 0;
			right: 0;
			top: -100px;
			position: fixed;
			box-shadow: 0 0 15px #B7AFAF;
			padding: 0% 8%;
			background: black; 
			height: 70px;
			z-index: 5;
			display: block;
  			transition: top 0.3s;
		}

		.logo-beautiful{
			float: left;
			padding-top: 10px;
			width: 80px;
		}

		#navbar ul{
			display: flex;
			float: right;
		}

		#navbar ul li{
			list-style: none;
			line-height: 80px;
			text-align: center;
		}

		#navbar ul li a{
			display: block;
			padding: 0 20px;
			text-decoration: none;
			color: white;
			font-weight: bold;
			font-size: 16px;
			font-family: 'Acme', sans-serif;
		}

		#navbar ul li a.active,
		#navbar ul li a:hover{
			text-decoration: underline;
			color: #AED6F2;
		}
	</style>
</head>

<body>
	<!-- 1. navbar - header -->
	<div id="navbar">
		<a href="index.php" ><img class="logo-beautiful" src="img/LogoBeautifulMalang.png" alt="Logo Beautiful Malng"></a>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="indexExplore.php">Explore</a></li>
			<li><a href="maps5.php">Digital Maps</a></li>
			<li><a href="https://budpar.malangkota.go.id/">Web Disbudpar</a></li>
			<!-- <li><a href="socialMedia.php">Social Media</a></li> -->
			<li><a href="#video">Contact</a></li>
		</ul>		
</div>

<!-- 2. indexlogo -->
	<div class="indexLogo">
		<ul>
			<li><a href="index.php"><img class="logo-malang" src="img/LogoKotaMalang.png" alt="Logo Kota Malang"></a></li>
			<li><a href="index.php"><img class="logo-beautiful-index" src="img/LogoBeautifulMalang.png" alt="Logo Beautiful Malang"></a></li>
			<li><a href="#"><img class="logo-osiji" src="img/LogoOsiji.png" alt="Logo Osi & Ji Malang"></a></li>
		</ul>


		<a href="#" ><img class="logo-wonderful" src="img/LogoWonderful.png" alt="Logo Wonderful Indonesia"></a>

<!-- 3. index animasi -->
		<!-- <div class="indexAnimasi"> -->
			<!-- <h1>Nonny Windarti</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, itaque at maiores exercitationem perspiciatis facilis eligendi, eveniet deleniti assumenda nesciunt ipsam inventore accusantium ducimus, sapiente vel veniam ab magni cum!</p> -->
			
			<img class="icon-malang" src="img/IconMalang.png" alt="Icon Kota Malang">
			<!-- <img class="mobil-malang" src="img/mobil2.png" alt="Animasi mobil"> -->
		<!-- </div> -->

<!-- 4. index menu -->
		<div class="indexMenu">
			<ul>
				<li>
					<a href="indexExplore.php">
						<span>
							<p class="menu1">Explore</p>
						</span>
					</a>
				</li>

				<li>
					<a href="maps5.php">
						<span>
							<p class="menu2">Digital Maps</p>
						</span>
					</a>
					
				</li>

				<li>
					<a href="https://budpar.malangkota.go.id/">
						<span>
							<p class="menu3">Web Disbudpar</p>
						</span>
					</a>
				</li>

				<li>
					<a href="#video">
						<span>
							<p class="menu4">Contact</p>
						</span>
					</a>
				</li>

				<!-- <li><a href="#">
						<span>
							<p class="menu5">COE</p>
						</span>
					</a>
				</li> -->
			</ul>
		</div>
	</div>

<!-- 5. kategori -->
	<div class="kategori">
		<h1>Kategori Wisata</h1>
		<?php while ($row = mysqli_fetch_assoc($kategori)): 
		/*die(print_r($row))*/ ?>
		<div class="s1">
			<div class="s2">
			<?="<img src='img/".$row['kat_ikon']."'style='height: 60px;'>"?>
				<h2><h2>
					<a href="indexKategori.php?artikel_kat=<?= $row['kat_id']; ?>"><?php echo $row['kat_judul']; ?>
					</a>
				</h2></h2>
			</div>
			<p><?php echo $row['kat_isi']; ?></p>
			<!-- <a href="#">READ MORE</a> -->
		</div>
		<?php endwhile; ?>
	</div>

<!-- 6. video -->
<div id="video">
<iframe width="510" height="280" src="https://www.youtube.com/embed/bP8R--oDv2s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<div class="quotes">
	<i class="fa fa-quote-left" aria-hidden="true"></i>
	<h1>Malang Kipa Ilakes</h1>
	<i class="fa fa-quote-right" aria-hidden="true" style="padding-left: 400px;"></i>	
	</div>
</div>



<script>
	// When the user scrolls down 20px from the top of the document, slide down the navbar
	window.onscroll = function() {scrollFunction()};
	function scrollFunction() {
  		if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
    	document.getElementById("navbar").style.top = "0px";
  		} else {
    	document.getElementById("navbar").style.top = "-100px";
  		}
	}
</script>	

</body>

 <?php 
require_once "view/footer.php";
  ?>