<?php 

include 'functions.php';

$id = $_GET['id'];

$query1 = mysqli_query($conn,"SELECT * FROM barang WHERE id = '$id'");

foreach ($query1 as $last) {
	
	$id_barang = $last['id'];
	$kd_barang = $last['kd_barang'];
	$barang = $last['barang'];
	$jenis = $last['jenis'];
	$jumlah = $last['jumlah'];
	$lokasi = $last['lokasi'];
	$sumber_dana = $last['sumber_dana'];
	$harga = $last['harga'];
	$kondisi = $last['kondisi'];
	$thn_peroleh = $last['thn_peroleh'];


$query2 = mysqli_query($conn,"SELECT * FROM data_pertahun WHERE tahun = '$thn_peroleh'");


foreach ($query2 as $key) {

	$id 	= $key['id'];
	$tahun	= $key['tahun'];
	$elektronik 	= $key['elektronik'];
	$non_elektronik	= $key['non_elektronik'];
	$jumlah_total	= $key['jumlah_total'];


	
	}


}

$akhir 	= $jumlah_total - $jumlah;
$EL 	= $elektronik - $jumlah;
$NL 	= $non_elektronik - $jumlah;


if ($jenis == 1) {

	$pindah = mysqli_query($conn,"INSERT INTO last_data VALUES
		( '$id_barang','$kd_barang','$barang','$jenis','$jumlah','$lokasi','$sumber_dana','$harga','$kondisi','$thn_peroleh' )");
	$update = mysqli_query($conn,"UPDATE data_pertahun SET elektronik = '$EL' , jumlah_total = '$akhir' WHERE tahun = $thn_peroleh");

	$hapus = mysqli_query($conn,"DELETE FROM barang WHERE id ='$id_barang'");

		echo "<script>
				alert('Data Berhasil Dipisahkan');
				window.location.href = '../data_barang.php';
		</script>";

	
}else{

	$pindah = mysqli_query($conn,"INSERT INTO last_data VALUES
		( '$id_barang','$kd_barang','$barang','$jenis','$jumlah','$lokasi','$sumber_dana','$harga','$kondisi','$thn_peroleh' )");

	$update = mysqli_query($conn,"UPDATE data_pertahun SET non_elektronik = '$NL' , jumlah_total = '$akhir' WHERE tahun = $thn_peroleh");

	$hapus = mysqli_query($conn,"DELETE FROM barang WHERE id ='$id_barang'");

		echo "<script>
				alert('Data Berhasil Dipisahkan');
				window.location.href = '../data_barang.php';
		</script>";

}


 ?>