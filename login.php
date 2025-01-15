<?php
session_start();
require_once "konmysqli.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title p-b-55">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
						<input class="input100" type="text" name="user" id="user" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="password" name="pass" id="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>



					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" name="Login" id="Login" value="Login">
							Login
						</button>
						<input type="hidden" value="<?php echo $gid_tahun_ajaran; ?>" name="id_tahun_ajaran">
					</div>


				</form>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>

</html>

<?php
if (isset($_POST["Login"])) {
	$usr = $_POST["user"];
	$pas = $_POST["pass"];

	$sql1 = "select * from `$tbuser` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";

	if (getJum($conn, $sql1) > 0) {
		$d = getField($conn, $sql1);
		$kode = $d["id_user"];
		$nama = $d["nama_user"];
		$level = $d["level"];
		$_SESSION["cid"] = $kode;
		$_SESSION["cnama"] = $nama;
		$_SESSION["cstatus"] = $level;
		echo "<script>alert('Otentikasi " . $_SESSION["cstatus"] . " an " . $_SESSION["cnama"] . " (" . $_SESSION["cid"] . ") berhasil Login!');
		document.location.href='index.php?mnu=home';</script>";
	} else {
		session_destroy();
		echo "<script>alert('Otentikasi Login GAGAL !,Silakan cek data Anda kembali...');
			document.location.href='login.php';</script>";
	}
}

function getJum($conn, $sql)
{
	$rs = $conn->query($sql);
	$jum = $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn, $sql)
{
	$rs = $conn->query($sql);
	$rs->data_seek(0);
	$d = $rs->fetch_assoc();
	$rs->free();
	return $d;
}
?>