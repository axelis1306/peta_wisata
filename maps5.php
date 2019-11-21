 
<?php
if (isset($_GET['page']) == null) {
 header("location:maps5.php?page=homeMaps");
}
include 'functions/functionsMaps.php';
$konfigurasi = new konfigurasi();
?>
<html>
<?php include 'view/header1.php'; ?>
<body style="margin-top:10px">
 <div class="container">
 <?php
 switch ($_GET['page']) {
   case 'kelola':
    include 'input.php';
   break;
   default:
    include 'homeMaps6.php';
   break;
   }
 ?>
 </div>
</body>
<?php include 'view/footer.php'; ?>
