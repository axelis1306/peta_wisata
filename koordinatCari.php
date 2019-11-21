<?php
include 'functions/functionsMaps.php';
$konfigurasi = new konfigurasi();
$getData = $konfigurasi->tampilDataPencarianLokasi('tabel_data','artikel_id',$_GET['artikel_id']);
header("Content-type: text/xml");
try {
 echo "<markers>";
 if ($getData->rowCount() == 1) {
    $result = $getData->fetch(PDO::FETCH_OBJ);
   echo "<marker ";
   echo "a='" . $result->artikel_id. "' ";
   echo "b='" . $result->artikel_lat. "' ";
   echo "c='" . $result->artikel_long. "' ";
   echo "d='" . $result->artikel_judul. "' ";
   echo "g='" . $result->artikel_alamat. "' ";
   echo "h='" . $result->artikel_buka. "' ";
   echo "f='" . $result->artikel_gambar. "' ";
   echo "i='" . $result->artikel_tiket. "' ";
   // echo "e='" . $result->icon. "' ";
   echo "/>";
  }
 echo "</markers>";
}
catch (PDOException $e) {
 echo $e->getMessage();
}
?>