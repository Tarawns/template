<?php
require 'function_auth.php';
if (isset($_POST['btn-regist'])) {
	if(registrasi($_POST) > 0) {
		echo"<script>
			alert('User Baru Berhasil Ditambahkan!');
		</script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>halaman registrasi</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body{
			margin: 0px;
			padding: 0px;
			background-color: #1e88e5 !important;
		}
	</style>
</head>
<body>

	<div class="content-auth" style="">
		<h1>REGISTRASI AKUN</h1>
		<form action="" method="POST">
			<table class="tauth" cellspacing="0" cellpadding="10">
				<tr>
					<th>Username</th>
					<td><input type="text" class="input" name="username" id="username" required></td>
				</tr>
				<tr>
					<th>Password</th>
					<td><input type="password" class="input" name="password" id="password" required></td>
				</tr>
				<tr>
					<th colspan="2" style="text-align: center;"><button type="submit" class="btn-auth" name="btn-regist" id="btn-regist">SIMPAN</button></th>
				</tr>
				<tr>
					<th colspan="2" style="text-align: center;">Sudah memiliki akun ? <a href="login.php">Login</a></th>
				</tr>
			</table>
		</form>
	</div>

</body>
</html>