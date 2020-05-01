<?php

include 'functions.php';

session_start();

if (!isset($_SESSION['login'])) {
 	header("Location:../404.html");
 	exit;
 } 

if (isset($_POST['submit'])) {

	if (update_barang($_POST) > 0) {
		echo "<script>
				alert('DATA BERHASIL DIUBAH');
				 document.location.href = '../data_barang.php';
			</script>";

	} else {
		echo "<script>
				alert('DATA GAGAL DIUBAH');
				 document.location.href = '../data_barang.php';
			</script>";
		
	}	
	
}

$elektronik = 1;
$non_elektronik = 2;
$baik = 1;
$sedang = 2;
$berat = 3;

$id = $_GET['id'];
$barang = mysqli_query($conn,"SELECT * FROM barang WHERE id = '$id'");


 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Inventaris - Barang</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/UPI.png" type="image/x-icon"/>

	
	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/azzara.min.css">
	<!-- CSS Just for demo purpos../'t include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">

</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="green">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="dashboard.php" class="logo">
					<img src="../assets/img/UPI.png" style="height: 50px; width: 50px;" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
						
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											
										</div>
									</div>
								</li>
								
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											
										</div>
									</div>
								</li>	
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<?php echo"<img src='img/".$_SESSION["gambar"]."'class='avatar-img rounded-circle'>" ?>
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><?php echo"<img src='img/".$_SESSION["gambar"]."'class='avatar-img rounded-circle'>" ?></div>
										<div class="u-text">
											<h4><?php echo $_SESSION['nama_user']; ?></h4>
											<p class="text-muted"><?php echo $_SESSION['unit_kerja']; ?></p>
											<a href="../userprofile.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									
									<a class="dropdown-item" href="../logout.php">Logout</a>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<?php echo"<img src='img/".$_SESSION["gambar"]."'class='avatar-img rounded-circle'>" ?>
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $_SESSION['nama_user']; ?>
									<span class="user-level"><?php echo $_SESSION['unit_kerja']; ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="../dashboard.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item active">
							<a href="../data_barang.php">
								<i class="fas fa-archive"></i>
								<p>Data Barang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="add_barang.php">
								<i class="fas fa-plus"></i>
								<p>Add Barang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="../barang_elektronik.php">
								<i class="fas fa-tag"></i>
								<p>Barang Elektronik</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="../barang_non_elektronik.php">
								<i class="fas fa-tags"></i>
								<p>Barang Non-Elektronik</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Kondisi Barang</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="../kondisi/baik.php">
											<span class="sub-item">Baik</span>
										</a>
									</li>
									<li>
										<a href="../kondisi/rusak_ringan.php">
											<span class="sub-item">Rusak Ringan</span>
										</a>
									</li>
									<li>
										<a href="../kondisi/rusak_berat.php">
											<span class="sub-item">Rusak Berat</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="../last_data.php">
								<i class="fas fa-database"></i>
								<p>Last Data</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="../add_admin.php">
								<i class="fas fa-user-alt"></i>
								<p>Add admin</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Tambah Barang</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="fa fa-briefcase"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Forms</a>
							
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Form Barang</div>
								</div>
								<?php 
								foreach ($barang as $brg):?>
								 

								<form action="" method="POST">
								<input type="hidden" name="id" value="<?php echo $brg['id']; ?>">

								<div class="card-body">
									<div class="form-group">
										<label for="email2">Kode Barang</label>
										<input type="text" name="kd_barang" value="<?php echo $brg['kd_barang']; ?>" class="form-control" id="email2" placeholder="Nama Barang">
										
									</div>
									<div class="form-group">
										<label for="email2">Nama Barang</label>
										<input type="text" name="barang" value="<?php echo $brg['barang']; ?>" class="form-control" id="email2" placeholder="Nama Barang">
										
									</div>

									<input class="form-radio-input" hidden="" type="radio" name="jenis" value="<?php echo $brg['jenis']; ?>"  checked="">
									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Jumlah Barang</label>
										<div class="col-md-9 p-0">
											<input type="text" disabled="" name="jumlah" value="<?php echo $brg['jumlah']; ?>" class="form-control input-full" id="inlineinput" placeholder="Enter Input">
										</div>
									</div>
								
									<div class="form-group">
										<label for="email2">Lokasi Barang</label>
										<input type="text" value="<?php echo $brg['lokasi']; ?>" name="lokasi" class="form-control" id="email2" placeholder="Lokasi Barang">
										
									</div>

										<input type="hidden" name="sumber_dana" value="<?php echo $brg['sumber_dana']; ?>" class="form-control" id="email2" placeholder="">

									<div class="form-group">
										<label for="email2">Harga</label>
										<input type="text" name="harga" value="<?php echo $brg['harga']; ?>" class="form-control" id="email2" placeholder="Nama Barang">
										
									</div>
									<div class="form-check">
										<label>Kondisi Barang</label><br/>
										<label class="form-radio-label">
											<input class="form-radio-input" type="radio"  name="kondisi" value="<?php echo $baik; ?>"  checked="">
											<span class="form-radio-sign">Baik</span>
										</label>
										<label class="form-radio-label ml-3">
											<input class="form-radio-input" type="radio" name="kondisi" value="<?php echo $sedang; ?>">
											<span class="form-radio-sign">Rusak Sedang</span>
										</label>
										<label class="form-radio-label ml-3">
											<input class="form-radio-input" type="radio"  name="kondisi" value="<?php echo $berat; ?>">
											<span class="form-radio-sign">Rusak Berat</span>
										</label>
									</div>
								</div>
								<div class="form-group">
										<label for="email2">Tahun Perolehan</label>
										<input type="text" value="<?php echo $brg['thn_peroleh']; ?>" name="thn_peroleh" class="form-control" id="email2" placeholder="">
										
									</div>
								<div class="card-action">
									<button class="btn btn-success" type="Submit" name="submit">Submit</button>
									
								</div>
							</div>
									
								</form>


								<?php endforeach; ?>

			</div>
		</div>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="../assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="../assets/js/plugin/datatables/datatables.min.js"></script>


<!-- Bootstrap Toggle -->
<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="../assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="../assets/js/ready.min.js"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="../assets/js/setting-demo.js"></script>
<script src="../assets/js/demo.js"></script>
</body>
</html>