<?php  
// $host = 'localhost'; //127.0.0.1
// $user = 'root';
// $pass = ''; //'root'
// $db   = 'laravel_gis';

// $link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error());
require_once "core/init.php";
require_once "view/header1.php";
$kategori = tampilkan_kategori();
$articles = tampilkan();
// die(print_r($articles));

//menampilkan yg dicari
if (isset($_GET['artikel_kat'])) {
	// get cari yg ada di url
	$id = $_GET['artikel_kat'];
	$articles = tampilkan_per_kategory_id($id);
    $articles1 = tampilkan_per_kategory($id);
    while($row = mysqli_fetch_assoc($articles1)){
        $kat_judul = $row['kat_judul'];
        
        
    }
}




?>



<!DOCTYPE html>
<html lang="en">
<!-- <head>
	<meta charset="utf-8">
	<title>jquery - php crud</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="favicon.png"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head> -->

<body>




		


<div id="artikel">

<!-- <p id="title">
    <?=$name; ?>
</p> -->
     <div class="panel-heading1">
            <center>
                <h4>Wisata Kota Malang &nbsp;-&nbsp; <a href=""><?=$kat_judul; ?></a></h4>
            </center>
        </div>
<ul>
<li>
<select class="searchKategori"  onChange="document.location.href=this.options[this.selectedIndex].value;" name="pencarianKategori">

<option value="indexExplore.php">Kategori</option>
<option value="indexExplore.php">All</option>

<!-- <option selected="selected" value="indexExplore.php">All</option> -->

<?php while ($row = mysqli_fetch_assoc($kategori)): /*die(print_r($row))*/ ?>

<option value="indexKategori.php?artikel_kat=<?= $row['kat_id']; ?>"><?php echo $row['kat_judul']; ?></option>

<?php endwhile; ?>

</select>
</li>

</ul>
</div>


<div class="artikel">



 <?php 

        // tampilkan row maps selama masih ada
        while($row = mysqli_fetch_array($articles)) {
            // if($row['status']==1) {
            //     $status = "Aktif";
            // } else {
            //     $status = "Tidak Aktif";
            // }
    ?>
        <div class="each_article">
        <p><?="<img src='img/".$row['artikel_gambar']."'style='width:346px; max-height: 180PX; border-bottom: 2px solid #AED6F2;'>"?></td></p>

        <div class="kelompok">
        <!-- klik judul akan masuk halaman kontenberdasarkan id -->
        <h3><a href="single3.php?artikel_id=<?= $row['artikel_id']; ?>"><?php echo $row['artikel_judul']; ?></a></h3>
        
        <div class="kelompok1">
        <p class="alamat">
            <!-- excerpt untuk memotong kata yg ditampilkan -->
            <i class="fa fa-map-marker"></i>
            &nbsp;&nbsp;<?= $row['artikel_alamat']; ?>
        </p>

        <p class="buka"> 
            <i class="fa fa-clock-o"></i>
            &nbsp;<?= $row['artikel_buka']; ?> </p>

        <p class="tiket"> 
            <i class="fa fa-ticket"></i>
            &nbsp;<?= $row['artikel_tiket']; ?> </p>
        </div>

        <p class="description">
            <?= excerpt($row['artikel_isi']); ?>
        </p>


        <p>
        <a href="single3.php?artikel_id=<?= $row['artikel_id']; ?>"><?php  $row['artikel_judul']; ?>Read More</a>
        </p>

        </div>


        </div>




    <?php


        }
    ?>

 
</div>
 

 <?php 
require_once "view/footer.php";
  ?>

