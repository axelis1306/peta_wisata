<?php  
require_once "core/init.php"; 
require_once "view/header1.php";
?>

 

    <?php 
        $i = 1;
        $jml_per_halaman = 9; // jumlah data yg ditampilkan perhalaman
        $jml_data0=mysqli_query($link, "select * from artikel");
        $jml_data = mysqli_num_rows($jml_data0);
        $jml_halaman = ceil($jml_data / $jml_per_halaman);
        // query pada saat mode pencarian
        if(isset($_POST['cari'])) {
            $kunci = $_POST['cari'];
            // echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";
            $query0= "
                SELECT * FROM artikel 
                WHERE artikel_judul LIKE '%$kunci%'
                OR artikel_alamat LIKE '%$kunci%'
                -- OR buka LIKE '%$kunci%'
                -- OR tiket LIKE '%$kunci%'
                -- OR status LIKE '%$kunci%'
            ";
           $query = mysqli_query($link, $query0);
        // query jika nomor halaman sudah ditentukan

        } elseif(isset($_POST['cari2'])) {
            $kunci = $_POST['cari2'];
            // echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";
            $query0= "SELECT * FROM artikel WHERE artikel_kat=$id";
           $query = mysqli_query($link, $query0);
        // query jika nomor halaman sudah ditentukan
        
        } elseif(isset($_POST['halaman'])) {
            $halaman = $_POST['halaman'];
            $i = ($halaman - 1) * $jml_per_halaman  + 1;
            $query0="SELECT * FROM artikel LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman";
            $query = mysqli_query($link, $query0);
        // query ketika tidak ada parameter halaman maupun pencarian
        } else {
            $query0= "SELECT * FROM artikel LIMIT 0, $jml_per_halaman";
            $query = mysqli_query($link, $query0);
            $halaman = 1; //tambahan
        }
         
        // tampilkan data artikel selama masih ada
        while($data = mysqli_fetch_array($query)) {
            // if($data['status']==1) {
            //     $status = "Aktif";
            // } else {
            //     $status = "Tidak Aktif";
            // }
    ?>
        <div class="each_article">
        <p><?="<img src='img/".$data['artikel_gambar']."'style='width:346px; max-height: 180PX; border-bottom: 2px solid #AED6F2;'>"?></td></p>

        <div class="kelompok">
        <!-- klik judul akan masuk halaman kontenberdasarkan id -->
        <h3><a href="single3.php?artikel_id=<?= $data['artikel_id']; ?>"><?php echo $data['artikel_judul']; ?></a></h3>
        
        <div class="kelompok1">
        <p class="alamat">
            <!-- excerpt untuk memotong kata yg ditampilkan -->
            <i class="fa fa-map-marker"></i>
            &nbsp;&nbsp;<?= $data['artikel_alamat']; ?>
        </p>

        <p class="buka"> 
            <i class="fa fa-clock-o"></i>
            &nbsp;<?= $data['artikel_buka']; ?> </p>

        <p class="tiket"> 
            <i class="fa fa-ticket"></i>
            &nbsp;<?= $data['artikel_tiket']; ?> </p>
        </div>

        <p class="description">
            <?= excerpt($data['artikel_isi']); ?>
        </p>


        <p>
        <a href="single3.php?artikel_id=<?= $data['artikel_id']; ?>"><?php  $data['artikel_judul']; ?>Read More</a>
        </p>

        </div>


        </div>




    <?php
        $i++;


        }
    ?>
<div class="each" style="height: 1500px;"><br><br><br></div>
 
<?php if(!isset($_POST['cari'])) { ?>
<!-- untuk menampilkan menu halaman -->
<div class="pagination pagination-right">
  <div class="pagin">

    <ul>
        <a href="#">&laquo;</a>
    <?php

    // tambahan
    // panjang pagig yang akan ditampilkan
    $no_hal_tampil = 5; // lebih besar dari 3

    if ($jml_halaman <= $no_hal_tampil) {
        $no_hal_awal = 1;
        $no_hal_akhir = $jml_halaman;
    } else {
        $val = $no_hal_tampil - 2; //3
        $mod = $halaman % $val; //
        $kelipatan = ceil($halaman/$val);
        $kelipatan2 = floor($halaman/$val);

        if($halaman < $no_hal_tampil) {
            $no_hal_awal = 1;
            $no_hal_akhir = $no_hal_tampil;
        } elseif ($mod == 2) {
            $no_hal_awal = $halaman - 1;
            $no_hal_akhir = $kelipatan * $val + 2;
        } else {
            $no_hal_awal = ($kelipatan2 - 1) * $val + 1;
            $no_hal_akhir = $kelipatan2 * $val + 2;
        }

        if($jml_halaman <= $no_hal_akhir) {
            $no_hal_akhir = $jml_halaman;
        }
    }

    for($i = $no_hal_awal; $i <= $no_hal_akhir; $i++) {
        // tambahan
        // menambahkan class active pada tag li
        $aktif = $i == $halaman ? ' active' : '';
    ?>

    <li class="halaman<?php echo $aktif ?>" id="<?php echo $i ?>"><a href="#"><?php echo $i ?></a></li>
    <?php } ?>
    <a href="#">&raquo;</a>
</ul>

  </div>
</div>
<?php } ?>
 
