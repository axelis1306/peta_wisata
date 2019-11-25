<?php 
session_start();
/**
 * ALTER TABLE products ADD product_qty INT(11) NOT NULL AFTER `product_price`;
 	UPDATE `products` SET product_qty = 1000 WHERE 1;

	CREATE TABLE `products` (
 `product_id` int(100) NOT NULL AUTO_INCREMENT,
 `product_cat` int(11) NOT NULL,
 `product_brand` int(100) NOT NULL,
 `artikel_judul` varchar(255) NOT NULL,
 `product_price` int(100) NOT NULL,
 `product_qty` int(11) NOT NULL,
 `kat_isi` text NOT NULL,
 `kat_ikon` text NOT NULL,
 `product_keywords` text NOT NULL,
  CONSTRAINT fk_product_cat FOREIGN KEY fk_product_cat (product_cat) REFERENCES categories(cat_id),
    CONSTRAINT fk_product_brand FOREIGN KEY fk_product_brand (product_brand) REFERENCES brands(brand_id),
 PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
 	
 */
class Kategori
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getKategori(){
		$q = $this->con->query("SELECT * from kategori ORDER BY kat_id desc");
		
		$kategori = [];
		if ($q->num_rows > 0) {
			while($row = $q->fetch_assoc()){
				$kategori[] = $row;
			}
			//return ['status'=> 202, 'message'=> $ar];
			$_DATA['kategori'] = $kategori;
		}

		


		return ['status'=> 202, 'message'=> $_DATA];
	}

	public function addProduct($kat_judul,
								
								
								$kat_isi,
								
								
								
								
								
								$file){


		$fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
			
			//print_r($file['size']);

			if ($file['size'] > (1024 * 2)) {
				
				$uniqueImageName = time()."_".$file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/peta_wisata/img/".$uniqueImageName)) {
					
					$q = $this->con->query("INSERT INTO `kategori`( `kat_judul`, `kat_isi`, `kat_ikon`) VALUES ( '$kat_judul', '$kat_isi', '$uniqueImageName')");

					if ($q) {
						return ['status'=> 202, 'message'=> 'Kategori berhasil ditambahkan'];
					}else{
						return ['status'=> 303, 'message'=> 'Failed to run query'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'Failed to upload image'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB'];
			}

		}else{
			return ['status'=> 303, 'message'=> 'Invalid Image Format [Valid Formats : jpg, jpeg, png]'];
		}

	}


	public function editProductWithImage($pid,
										$kat_judul,
										
										
										$kat_isi,
										
										
										
										
										
										$file){


		$fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
			
			//print_r($file['size']);

			if ($file['size'] > (1024 * 2)) {
				
				$uniqueImageName = time()."_".$file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/peta_wisata/img/".$uniqueImageName)) {
					
					$q = $this->con->query("UPDATE `kategori` SET 
										
										
										`kat_judul` = '$kat_judul', 
										 
										
										`kat_isi` = '$kat_isi', 
										
										
										`kat_ikon` = '$uniqueImageName'
										WHERE kat_id = '$pid'");

					if ($q) {
						return ['status'=> 202, 'message'=> 'Kategori berhasil diubah'];
					}else{
						return ['status'=> 303, 'message'=> 'Failed to run query'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'Failed to upload image'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB'];
			}

		}else{
			return ['status'=> 303, 'message'=> 'Invalid Image Format [Valid Formats : jpg, jpeg, png]'];
		}

	}

	public function editProductWithoutImage($pid,
										$kat_judul,
										
										
										$kat_isi){

		if ($pid != null) {
			$q = $this->con->query("UPDATE `kategori` SET 
										
										 
										`kat_judul` = '$kat_judul', 
										
										
										`kat_isi` = '$kat_isi'
										
										
										
										WHERE kat_id = '$pid'");

			if ($q) {
				return ['status'=> 202, 'message'=> 'Kategori berhasil diubah'];
			}else{
				return ['status'=> 303, 'message'=> 'Failed to run query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=> 'Invalid product id'];
		}
		
	}


	

	public function deleteProduct($pid = null){
		if ($pid != null) {
			$q = $this->con->query("DELETE FROM kategori WHERE kat_id = '$pid'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Product removed from stocks'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Invalid product id'];
		}

	}




	
	

	
	

}


if (isset($_POST['GET_PRODUCT'])) {
	if (isset($_SESSION['admin_id'])) {
		$p = new Kategori();
		echo json_encode($p->getKategori());
		exit();
	}
}


if (isset($_POST['add_product'])) {

	extract($_POST);
	if (!empty($kat_judul) 
	
	
	&& !empty($kat_isi)
	
	
	
	
	&& !empty($_FILES['kat_ikon']['name'])) {
		

		$p = new Kategori();
		$result = $p->addProduct($kat_judul,
								
								
								$kat_isi,
								
								
								
								
								
								$_FILES['kat_ikon']);
		
		// header("Content-type: application/json");
		// echo json_encode($result);
		// http_response_code($result['status']);
		// exit();
		echo json_encode($result);
		exit();


	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Semua kolom harus
diisi']);
		exit();
	}



	
}


if (isset($_POST['edit_product'])) {

	extract($_POST);
	if (!empty($pid)
	&& !empty($e_kat_judul) 
	
	
	&& !empty($e_kat_isi)
	
	
	
	
	 ) {
		
		$p = new Kategori();

		if (isset($_FILES['e_kat_ikon']['name']) 
			&& !empty($_FILES['e_kat_ikon']['name'])) {
			$result = $p->editProductWithImage($pid,
								$e_kat_judul,
								
								
								$e_kat_isi,
								
								
								

								
								
								$_FILES['e_kat_ikon']);
		}else{
			$result = $p->editProductWithoutImage($pid,
								$e_kat_judul,
								
								
								$e_kat_isi);
		}

		echo json_encode($result);
		exit();


	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Semua kolom harus
diisi']);
		exit();
	}



	
}



if (isset($_POST['DELETE_PRODUCT'])) {
	$p = new Kategori();
	if (isset($_SESSION['admin_id'])) {
		if(!empty($_POST['pid'])){
			$pid = $_POST['pid'];
			echo json_encode($p->deleteProduct($pid));
			exit();
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Invalid product id']);
			exit();
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid Session']);
	}


}






?>