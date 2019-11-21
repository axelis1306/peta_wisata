<?php
include 'functions/functionsMaps.php';
$konfigurasi = new konfigurasi();
if (isset($_GET['term'])) {
$getData = $konfigurasi->cariData('tabel_data','artikel_id','artikel_judul', $_GET['term'],$_GET['term']);
$arr = array();
while ($data = $getData->fetch(PDO::FETCH_ASSOC)) {
    $arr[] = array(
      // 'label' => $data['id'].' - '.$data['title'],
    	'label' => $data['artikel_judul'],
      'value' => $data['artikel_id'].','.$data['artikel_judul'].','.$data['artikel_lat'].','.$data['artikel_long'],
    ); 
}
echo json_encode($arr);
} 
 ?> 