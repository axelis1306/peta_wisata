<?php 


//maps

// function tampil($tabel , $id){
//    $tampil = $this->db->prepare("SELECT * FROM $tabel ORDER BY $id DESC");
//    $tampil->execute();
//    return $tampil;
// }
// public function tampilBerdasarkanData($tabel , $kondisi ,$id){
//    $tampil = $this->db->prepare("SELECT * FROM $tabel WHERE $kondisi='$id'");
//    $tampil->execute();
//    return $tampil;
// }




//menampilkan semuanya
function tampilkan(){
	global $link;

	$query  = "SELECT * FROM artikel";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result;
}

function tampilkan_settings(){
	global $link;

	$query  = "SELECT * FROM setting ";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result;
}

function tampilkan_settings_zoom(){
	global $link;

	$query  = "SELECT * FROM settings where id=2 ";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result;
}

function tampilkan_settings_lat(){
	global $link;

	$query  = "SELECT * FROM settings where id=3 ";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result;
}

function tampilkan_settings_long(){
	global $link;

	$query  = "SELECT * FROM settings where id=4 ";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result;
}



function tampilkan_icon(){
	global $link;

	$query  = "SELECT * FROM kategories as k inner join maps as m on k.id=m.kategory_id";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result;
}

//memotong text yg ditampilkan
function excerpt($string){
	$string= substr($string, 0, 150);
	return $string . "...";
}

// fungsi cari
function hasil_cari($cari){
	global $link;
	$query  = "SELECT * FROM artikel WHERE artikel_judul LIKE '%$cari%'";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');
	return $result;
}

function hasil_cari2($cari){
	global $link;
	$query  = "SELECT COUNT(*) AS jumlah FROM maps WHERE title LIKE '%$cari%'";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');
	return $result;
}


//menampilkan kategori
function tampilkan_kategori(){
	global $link;

	$query  = "SELECT * FROM kategori";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result; 
}

//menampilkan artikel
function tampilkan_per_kategory_id($id){
	global $link;

	$query  = "SELECT * FROM artikel WHERE artikel_kat=$id";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result;
}

function tampilkan_per_kategory($id){
	global $link;

	$query  = "SELECT * FROM  kategori WHERE kat_id=$id";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result;
}


//icom
// function tampilkan_per_icon($id){
// 	global $link;

// 	$query  = "SELECT k.icon, m.id FROM kategories as k inner join maps as m on k.$id=m.$kategory_id";
// 	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

// 	return $result;
// }

function tampilkan_per_icon($id){
	global $link;

	$query  = "SELECT * FROM kategories as k inner join maps as m on k.id=m.kategory_id";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result;
}

// single
function tampilkan_per_id($id){
	global $link;

	$query  = "SELECT * FROM artikel WHERE artikel_id=$id";
	$result = mysqli_query($link, $query) or die('Gagal menampilkan data');

	return $result;
}

 
// function youtube($url){
// 	$link=str_replace('http://www.youtube.com/watch?v=', '', $url);
// 	$link=str_replace('https://www.youtube.com/watch?v=', '', $link);
// 	$data='<object width="800" height="500" data="http://www.youtube.com/v/'.$link.'" type="application/x-shockwave-flash">
// 	<param name="src" value="http://www.youtube.com/v/'.$link.'" />
// 	</object>';
// 	return $data;
// }
 




 ?>