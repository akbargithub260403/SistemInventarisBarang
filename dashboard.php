<?php
include 'function/functions.php';

session_start();

if (!isset($_SESSION['login'])) {
 	header("Location:404.html");
 	exit;
 } 

 $barang = mysqli_query($conn,"SELECT * FROM barang");



 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Inventaris - Barang</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/UPI.png" type="image/x-icon"/>
	  
	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script type="text/javascript" src="HIGHCARTS/js.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
	<!-- CSS Just for demo purpos't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">

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
					<img src="assets/img/UPI.png" alt="navbar brand" class="avatar-img" style="height: 50px; width: 50px;">
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
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<?php echo"<img src='function/img/".$_SESSION["gambar"]."'class='avatar-img rounded-circle'>" ?>
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><?php echo"<img src='function/img/".$_SESSION["gambar"]."'class='avatar-img rounded-circle'>" ?></div>

										<div class="u-text">
											<h4><?php echo $_SESSION['nama_user'];?></h4>
											<p class="text-muted"><?php echo $_SESSION['unit_kerja']; ?></p>
											<a href="userprofile.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									
									<a class="dropdown-item" href="logout.php">Logout</a>
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
							<?php echo"<img src='function/img/".$_SESSION["gambar"]."'class='avatar-img rounded-circle'>" ?>
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
						<li class="nav-item active">
							<a href="dashboard.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="data_barang.php">
								<i class="fas fa-archive"></i>
								<p>Data Barang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="function/add_barang.php">
								<i class="fas fa-plus"></i>
								<p>Add Barang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="barang_elektronik.php">
								<i class="fas fa-tag"></i>
								<p>Barang Elektronik</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="barang_non_elektronik.php">
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
										<a href="kondisi/baik.php">
											<span class="sub-item">Baik</span>
										</a>
									</li>
									<li>
										<a href="kondisi/rusak_sedang.php">
											<span class="sub-item">Rusak Ringan</span>
										</a>
									</li>
									<li>
										<a href="kondisi/rusak_berat.php">
											<span class="sub-item">Rusak Berat</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="last_data.php">
								<i class="fas fa-database"></i>
								<p>Last Data</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="function/add_admin.php">
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

				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h1>Dashboard</h1>
								<p class="card-category">Halaman Utama Inventaris - Barang</p>
						</div>
						

							<div id="data_barang">
								
							</div>
						
</div>
</div>
<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Barang</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Kode Barang</th>
													<th>Barang</th>
													<th>Jenis Barang</th>
													<th>Jumlah</th>
													<th>Lokasi</th>
													<th>Sumber Dana</th>
													<th>Harga</th>
													<th>Kondisi</th>
													<th>Tahun Perolehan</th>
												</tr>
											</thead>
												<tbody>
												<?php
												$i = 1;
												foreach ($barang as $brg):?>
											<tr>
												<td><?php echo $brg['kd_barang']; ?></td>
	<td><?php echo $brg['barang']; ?></td>
	<td>
        <?php 
          if ($brg["jenis"] == 1 ) {
           echo '<span class="btn btn-warning readonly">Elektronik</span>';
          }else if($brg["jenis"] == 2 ){
             echo'<span class="btn btn-success readonly">Non-Elektronik</span>';

           }
        ?>
    </td>
	<td><?php echo $brg['jumlah']; ?></td>
	<td><?php echo $brg['lokasi']; ?></td>
	<td><?php echo $brg['sumber_dana']; ?></td>
	<td><?php echo $brg['harga']; ?></td>
	<td>
        <?php 
          if ($brg["kondisi"] == 1 ) {
           echo '<span class="btn btn-success readonly">Baik</span>';
          }else if($brg["kondisi"] == 2 ){
             echo'<span class="btn btn-warning readonly">Rusak Ringan</span>';
          }else if($brg["kondisi"] == 3 ){
             echo'<span class="btn btn-danger readonly">Rusak Berat</span>';
         }
        ?>
    </td>
	<td><?php echo $brg['thn_peroleh']; ?></td>
												</tr>
												<?php
												 $i++;
												endforeach;
											
												 ?>
											</tbody>
										</table>
									</div>
								</div>
			</div>
		</div>



<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/plugin/moment/moment.min.js"></script>
<script src="assets/js/plugin/chart.js/chart.min.js"></script>
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/datatables/datatables.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="assets/js/plugin/gmaps/gmaps.js"></script>
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script>




<!-- HIGHCARTS -->
<script src="HIGHCHARTS/highcharts.js"></script>
<script src="HIGHCHARTS/exporting.js"></script>
<script src="HIGHCHARTS/export-data.js"></script>
<script src="HIGHCHARTS/accessibility.js"></script>

<figure class="highcharts-figure">
  <div id="data_barang"></div>
  <p class="highcharts-description">
   
  </p>
</figure>

<?php

 $data_pertahun = mysqli_query($conn,"SELECT * FROM data_pertahun");

$tahun 			= array();
$Elektronik 	= array();
$Non_Elektronik	= array();
$jumlah_total 	= array();

while ($data = mysqli_fetch_array($data_pertahun)) {
		
		$tahun[] 			= $data['tahun'];
		$Elektronik[] 		= floatval($data['elektronik']);
		$Non_Elektronik[] 	= floatval($data['non_elektronik']);
		$jumlah_total[] 	= floatval($data['jumlah_total']);



}
 ?>

<script type="text/javascript">
	Highcharts.chart('data_barang', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Data Inventaris Per-Tahun'
  },
  subtitle: {
    text: 'Universitas Pendidikan Indonesia'
  },
  xAxis: {
    categories:<?php echo json_encode($tahun); ?>,
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Jumlah'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Total',
    data: <?php echo json_encode($jumlah_total); ?>

  },{
    name: 'Barang Elektronik',
    data: <?php echo json_encode($Elektronik); ?>

  },{
    name: 'Barang Non-Elektronik',
    data: <?php echo json_encode($Non_Elektronik); ?>

  }]
});
</script>

</body>
</html>