<?php  
require_once "core/init.php";
require_once "view/header1.php";
$kategori = tampilkan_kategori();
$articles = tampilkan();

//menampilkan yg dicari
if (isset($_GET['artikel_kat'])) {
	// get cari yg ada di url
	$id = $_GET['artikel_kat'];
	$articles = tampilkan_per_kategory_id($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<body>

  <!-- fungsi mencari -->
<div id="artikel">
	<div class="panel-heading1">
		<center><h4>Wisata Kota Malang</h4></center>
    </div>
	<ul>
	<li>
		<select class="searchKategori"  onChange="document.location.href=this.options[this.selectedIndex].value;" name="pencarianKategori">
			<option value="indexExplore.php">Kategori</option>
			<option selected="selected" value="indexExplore.php">All</option>

			<?php while ($row = mysqli_fetch_assoc($kategori)): 
			/*die(print_r($row))*/ ?>
			<option value="indexKategori.php?artikel_kat=<?= $row['kat_id']; ?>"><?php echo $row['kat_judul']; ?></option>
			<?php endwhile; ?>

		</select>
	</li>
	<li>

<input class="search1" type="text" name="pencarian" placeholder="Cari..." required>  
</li>
</ul>
</div>


<div class="artikel">

		<!-- tempat untuk menampilkan data explore -->
		<div id="data-explore"></div>
	

<!-- memanggil berkas javascript yang dibutuhkan -->
<script src="view/js/jquery-1.8.3.min.js"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->
<script src="view/js/aplikasi3.js"></script>

</body>
</html>

</div>
 <?php 
require_once "view/footer.php";
  ?>

