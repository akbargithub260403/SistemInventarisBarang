<?php

session_start();

include 'functions.php';

$id = $_GET['id'];

if (!isset($_SESSION['login'])) {
 	header("Location:../404.html");
 	exit;
 } 

mysqli_query($conn,"DELETE FROM last_data WHERE id = '$id'");

echo 	"<script>
			alert('DATA BERHASIL DIHAPUS');
				document.location.href = '../data_barang.php';
		</script>";

 ?>