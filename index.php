<?php 
include 'function/functions.php';


if (isset($_SESSION['login'])) {
 	header("Location:dashboard.php");
 	exit;
 } 


if (isset($_POST['submit'])) {
	$USERNAME = $_POST['username'];
	$PASSWORD = $_POST['password'];

	$result = mysqli_query($conn,"SELECT * FROM data_admin WHERE username = '$USERNAME'");

	if ( mysqli_num_rows($result) > 0) {
		
		$row = mysqli_fetch_assoc($result);
		if (password_verify($PASSWORD, $row["password"])) {

			session_start();

		
			$_SESSION['login'] 		= true;
			$_SESSION['gambar']		= $row['img'];
			$_SESSION['id_user']	= $row['id_admin'];
			$_SESSION['nama_user']	= $row['nama'];
			$_SESSION['ttl']		= $row['TTL'];
			$_SESSION['unit_kerja']	= $row['unit_kerja'];
			$_SESSION['nip']		= $row['NIPTT'];

			echo "<script>
						alert('Selamat Datang Admin');
				 document.location.href = 'dashboard.php';
			</script>";
			exit;

		}else{
			echo "<script>
						alert('Password atau Username salah');
				 document.location.href = 'index.php';
			</script>";
		}

	}
}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Inventaris - Barang</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

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
</head>
<body class="login" style="background-image: url(assets/img/bg-404.jpeg); background-position: center;">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Inventaris Barang</h3>
			<div class="avatar-sm" style="position: absolute;top: 190px; left: 550px;">
									<img src="assets/img/UPI.png" alt="..." class="avatar-img rounded-circle">
			</div>

			<form method="post" action="">
				<div class="login-form">
				<div class="form-group form-floating-label">
					<input id="username" name="username" type="text" class="form-control input-border-bottom" required>
					<label for="username" class="placeholder">Username</label>
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
					<label for="password" class="placeholder">Password</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
			
				
				<div class="form-action mb-3">
					<button class="btn btn-primary btn-rounded btn-login" type="submit" name="submit"> Sign In</button>
				</div>
			</div>
			</form>

		</div>

		
	</div>
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/ready.js"></script>
</body>
</html>