<?php
include 'function/functions.php';
session_start();

if (!isset($_SESSION['login'])) {
 	header("Location:404.html");
 	exit;
 } 

$barang = mysqli_query($conn,"SELECT * FROM barang WHERE jenis = 2");
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
					<img src="assets/img/UPI.png" style="width: 50px; height: 50px;" alt="navbar brand" class="navbar-brand">
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
									<button onclick="Export()" class="btn btn-sm btn-warning ">
										<i class="fas fa-arrow-circle-down"></i>
									</button>
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
											<h4><?php echo $_SESSION['nama_user']; ?></h4>
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
									<li>
										
									</li>
									
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
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
						<li class="nav-item active">
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
							<div class="d-flex align-items-center">
										<h4 class="card-title">Barang Non-Elektronik</h4>
											
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<div id="container">

											<form method="POST" name="proses">

										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Kode Barang</th>
													<th>Barang</th>
													<th>Jenis Barang</th>
													<th>Jumlah</th>
													<th>Lokasi</th>
													<th>Sumber Dana</th>
													<th>Harga</th>
													<th>kondisi</th>
													<th>Tahun Perolehan</th>
													<th style="width: 10%">Action</th>
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
	<td>
		<div class="form-button-action">
		<a href="function/update.php?id=<?php echo$brg['id'];?>"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
		<i class="fa fa-edit"></i>
		</button></a>
		<a href="function/last_data.php?id=<?php echo$brg['id'];?>"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
		<i class="fa fa-times"></i>
		</button></a>
		</div>
	</td>
												</tr>
												<?php
												 $i++;
												endforeach;
											
												 ?>
											</tbody>
										</table>
												
											</form>

										</div>
									</div>
								</div>




							</div>
						</div>
					</div>
				</div>




			</div>
		</div>
			  <script>
	$(document).ready(function(){

		//penggunaan statement 1
		$('#select_all').on('click', function(){

			if(this.checked) {
				$('.check').each(function(){
					this.checked = true;
				})
			}else{
				$('.check').each(function(){
					this.checked = false;
				})


			}



		});

		//penggunaan statement 2
		$('.check').on('click',function(){

			if ($('.check:checked').length == $('.check').length) {
				$('#select_all').prop('checked', true)
			}else{
				$('#select_all').prop('checked', false)
			}

		})
	})

function Export(){
	document.proses.action = 'Export/barang_non_elektronik.php';
	document.proses.submit();
}

</script>

<script type="text/javascript" src="liveSearchBRG.js"></script>

<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="assets/js/plugin/datatables/datatables.min.js"></script>


<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script>
</body>
</html>