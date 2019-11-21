<?php   


function tampilkan(){
	global $link;

	$query  = "SELECT * FROM blog";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result;
}

// single
function tampilkan_per_id($id){
	global $link;

	$query  = "SELECT * FROM blog WHERE id=$id";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result;
}


// fungsi cari
function hasil_cari($cari){
	global $link;
	$query  = "SELECT * FROM blog WHERE judul LIKE '%$cari%'";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');
	return $result;
}

// refaktor kode untuk cari
function result($query){
	global $link;
	if($result = mysqli_query($link, $query) or die('Gagal menampilkan data')){
		return $result;
	}
}

//inti query tambah data
function tambah_data($judul, $konten, $tag){
	$query= "INSERT INTO blog (judul, isi, tag) VALUES ('$judul', '$konten', '$tag')";
	return run($query);
}

//edit data
function edit_data($judul, $konten, $tag, $id){
	$query= "UPDATE blog SET judul='$judul', isi='$konten', tag='tag' WHERE id=$id";
	return run($query);
}

//hapus data
function hapus_data($id){
	$query= "DELETE FROM blog WHERE id=$id";
	return run($query);
}


//dijadikan 1 fungsi krn edit hapus tambah data sama dgn kode ini
function run($query){
	global $link;

	//eksekusinya
	if (mysqli_query($link, $query)) return true; 
	else return false;
}

//memotong text yg ditampilkan
function excerpt($string){
	$string= substr($string, 0, 10);
	return $string . "...";
}

 ?>