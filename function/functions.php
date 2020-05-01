<?php

	$localhost = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'inventaris_barang';
	
	$conn = mysqli_connect($localhost , $username, $password, $db );

	if(mysqli_connect_errno()){
		echo "Koneksi database Gagal : ". mysqli_connect_error(); 
	}

	error_reporting(0);

	function add_barang($brg){
		global $conn;
 
		// untuk table barang
		$kd_barang = $_POST['kd_barang'];
		$barang = $_POST['barang'];
		$jenis = $_POST['jenis'];
		$jumlah = $_POST['jumlah'];
		$lokasi = $_POST['lokasi'];
		$sumber_dana = $_POST['sumber_dana'];
		$harga = $_POST['harga'];
		$kondisi = $_POST['kondisi'];
		$thn_peroleh = $_POST['thn_peroleh'];
		

		$coba = mysqli_query($conn,"SELECT * FROM data_pertahun WHERE tahun = '$thn_peroleh'");

		foreach ($coba as $thn) {

		$thn['id'];
		$thn['tahun'];
		$thn['elektronik'];
		$thn['non_elektronik'];
		$thn['jumlah_total'];

		$akhir 	= $jumlah + $thn['jumlah_total'];
		$EL 	= $jumlah + $thn['elektronik'];
		$NL 	= $jumlah + $thn['non_elektronik'];

		
		}

		if ($jenis == 1) {
			 $update = mysqli_query($conn,"UPDATE data_pertahun SET elektronik = '$EL' , jumlah_total = '$akhir' WHERE tahun = '$thn_peroleh'");

		 	$sql = "INSERT INTO barang VALUES('','$kd_barang','$barang','$jenis','$jumlah','$lokasi','$sumber_dana','$harga','$kondisi','$thn_peroleh')";

		}else{

			 $update = mysqli_query($conn,"UPDATE data_pertahun SET non_elektronik = '$NL' , jumlah_total = '$akhir' WHERE tahun = '$thn_peroleh'");

		 	$sql = "INSERT INTO barang VALUES('','$kd_barang','$barang','$jenis','$jumlah','$lokasi','$sumber_dana','$harga','$kondisi','$thn_peroleh')";

		}

		$query = mysqli_query($conn,$sql);

		return mysqli_affected_rows($conn);
	}

	function update_barang($brg){
		global $conn;

		$id = $_POST['id'];
		$kd_barang = $_POST['kd_barang'];
		$barang = $_POST['barang'];
		$lokasi = $_POST['lokasi'];
		$sumber_dana = $_POST['sumber_dana'];
		$harga = $_POST['harga'];
		$kondisi = $_POST['kondisi'];
		$thn_peroleh = $_POST['thn_peroleh'];


		$jenis = $_POST['jenis'];

		$sql = "UPDATE barang SET kd_barang = '$kd_barang' , barang = '$barang' , jenis = '$jenis' , lokasi = '$lokasi' , sumber_dana = '$sumber_dana' ,harga = '$harga' , kondisi = '$kondisi' , thn_peroleh = '$thn_peroleh' WHERE id = '$id'";

		$query = mysqli_query($conn,$sql);

		return mysqli_affected_rows($conn);

	}




	function registrasi($data){

		global $conn;

		$nama = $data['nama'];
		$TTL = $data['TTL'];
		$unit_kerja = $data['unit_kerja'];
		$NIPTT = $data['NIPTT'];
		
		//upload gambar
		$gambar = upload();

		if (!$gambar) {
			return false;
		}

		$username = strtolower($data["username"]);
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	
		if ( $password !== $password2) {
			
			echo "<script>
						alert('Konfirmasi Password Tidak Sesuai');
				</script>";
		
			return false;

		}else{
			$password = password_hash($password, PASSWORD_DEFAULT);

		mysqli_query($conn,"INSERT INTO data_admin VALUES('','$nama','$TTL','$username','$password','$unit_kerja','$NIPTT','$gambar')");
		}
		

		return mysqli_affected_rows($conn);

	}

	function upload(){

		$namaFile 		= $_FILES['gambar']['name'];
		$ukuranFile		= $_FILES['gambar']['size'];
		$error 			= $_FILES['gambar']['error'];
		$tmpName		= $_FILES['gambar']['tmp_name'];


		// cek apakah tidak ada gambar yang di upload
		if ( $error === 4) {

			echo "<script>
						alert('Pilih gambar Terlebih Dahulu');
				</script>";
			
			return false;
		}

		// cek apakah yang di upload user
		$ekstensiGambarValid 		= ['jpg','jpeg','png'];
		$ekstensiGambar1 			= explode('.',$namaFile);
		$ekstensiGambar1 			= strtolower(end($ekstensiGambar1));

		if (!in_array($ekstensiGambar1, $ekstensiGambarValid)) {
			echo "<script>
						alert('Yang anda upload bukan Gambar');
				</script>";
				return false;
			
		}

		//generate nama file baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar1;

		move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

		return $namaFileBaru;


	}

	
	function update_data($data){
		global $conn;

		$id_admin = $data['id_admin'];
		$nama = $data['nama'];
		$ttl = $data['TTL'];
		$unit_kerja = $data['unit_kerja'];
		$NIPTT = $data['NIPTT'];
		$username = $data['username'];
		$password = $data['password'];

	

		$sql = "UPDATE data_admin SET nama = '$nama' ,TTL = '$ttl' , unit_kerja = '$unit_kerja' , NIPTT = '$NIPTT'  WHERE id_admin = '$id_admin'";

		$query = mysqli_query($conn,$sql);

		return mysqli_affected_rows($conn);
		
	}




	function cari($keyword){

		global $conn;

		$query = "SELECT * FROM barang 
					WHERE barang LIKE '%$keyword%' OR 
					sumber_dana LIKE '%$keyword%' OR
					lokasi LIKE '%$keyword%' OR 
					jumlah LIKE '%$keyword%' OR 
					thn_peroleh LIKE '%$keyword%'
					";

		$hasil = mysqli_query($conn,$query);

		return($hasil);
	}

	function cari_last_data($keyword){

		global $conn;

		$query = "SELECT * FROM last_data
					WHERE barang LIKE '%$keyword%' OR 
					sumber_dana LIKE '%$keyword%' OR
					lokasi LIKE '%$keyword%' OR 
					jumlah LIKE '%$keyword%' OR
					thn_peroleh LIKE '%$keyword%'
					";

		$hasil = mysqli_query($conn,$query);

		return($hasil);
	}

	


 ?>