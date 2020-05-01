<?php

include '../function/functions.php'; 

error_reporting(0);

$cek = $_POST['checked'];



if (!isset($cek)) {
	echo "
	<script>
		alert('pilih data yang ingin dihapus terlebih dahulu');
		window.location.href='../data_barang.php';
	</script>";
	

}else{

	foreach ($cek as $hps) {

		$query = mysqli_query($conn,"DELETE FROM last_data WHERE id = '$hps'");
		
	}

	if ($query) {
		echo "
	<script>
		alert('".count($cek)." Data Berhasil Dihapus');
		window.location.href='../data_barang.php';
	</script>";
	}else{
		echo "
	<script>
		alert('".count($hps)." Data Gagal Dihapus');
		window.location.href='../data_barang.php';
	</script>";
	}


 }

 ?>
