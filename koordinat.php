<?php
include 'functions/functionsMaps.php';
$konfigurasi = new konfigurasi();
$getData = $konfigurasi->tampil_icon('tabel_data');
header("Content-type: text/xml");
try {
  echo "<markers>";
    while ($result = $getData->fetch(PDO::FETCH_OBJ)) {
    if ($getData->rowCount() < 1) {
     echo "<marker Data Kosong />";
    }
    else {
     echo "<marker ";
     echo "a='" . $result->artikel_id. "' ";
     echo "b='" . $result->artikel_lat. "' ";
     echo "c='" . $result->artikel_long. "' ";
     echo "d='" . $result->artikel_judul. "' ";
     echo "e='" . $result->kat_ikon. "' ";
     echo "f='" . $result->artikel_gambar. "' ";
     echo "g='" . $result->artikel_alamat. "' ";
     echo "h='" . $result->artikel_buka. "' ";
     echo "i='" . $result->artikel_tiket. "' ";
     echo "/>";
    }
   }
  echo "</markers>";
}
catch (PDOException $e) {
   echo $e->getMessage(); 
}


?>
