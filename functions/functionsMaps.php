<?php  
/**
* Dibuat Oleh Hady Eka Saputra || www.java-sc.com
*/
class konfigurasi {
   public function __construct() { 
    try {
     $host = "localhost";
     $db = "peta_wisata";
     $user = "root";
     $pass = "";
     $this->db = new PDO('mysql:host='.$host.';dbname='.$db.'',''.$user.'',''.$pass.'');
     $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // echo "Berhasil terkoneksi !";
    } 
    catch (PDOException $e) {
     echo $e->getMessage();
    }
   }
public function getXMLData($tabel){
   $getXMLData = $this->db->prepare("SELECT * FROM maps");
   $getXMLData->execute();
   return $getXMLData; 
}

public function tampil($tabel , $id){
   $tampil = $this->db->prepare("SELECT * FROM maps ORDER BY $id DESC");
   $tampil->execute();
   return $tampil;
}
public function tampil_icon($tabel){
   $tampil = $this->db->prepare("SELECT * FROM kategori as k inner join artikel as m on k.kat_id=m.artikel_kat");
   $tampil->execute();
   return $tampil;
}

// public function cariData($table , $kolom1, $kolom2 ,$value1, $value2 ){
//   $cari = $this ->db->prepare("SELECT * FROM $table WHERE $kolom1 LIKE '%{$value1}%' OR $kolom2 LIKE '%{$value1}%' ");
//   $cari->execute();
//   return $cari;
//  }

public function cariData($table , $kolom1, $kolom2 ,$value1, $value2 ){
  $cari = $this ->db->prepare("SELECT * FROM artikel WHERE $kolom1  LIKE '%{$value1}%' OR $kolom2 LIKE '%{$value1}%' ");
  $cari->execute();
  return $cari;
 }

 public function tampilDataPencarianLokasi($tabel , $kolom, $value){
  $cari = $this->db->prepare("SELECT * FROM artikel WHERE id_artikel LIKE '%$value%'");
  $cari->execute();
  return $cari;
 }




}


?>