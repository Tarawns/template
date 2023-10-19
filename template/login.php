<?php
require 'koneksi.php';
session_start();
if (isset($_SESSION['login'])) {
	header("Location: index.php");
}

if (isset($_POST['btn-login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($conn,"SELECT * FROM t_user WHERE username = '$username'");

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row['password'])) {
			// set session
			$_SESSION['login'] = true;
			$_SESSION['username'] = 'username';
			header("Location: index.php");
			exit;
		}
	}
	$error = true;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<style type="text/css">
		body{
			margin: 0px;
			padding: 0px;
			background-color: #1e88e5!important;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="content-auth" style="">
		<h1>LOGIN SISTEM</h1>
		<?php if (isset($error)) :?>
			<p style="color: red; font-style: italic;"> Username / Password Salah!</p>
		<?php endif; ?>

		<form action="" method="POST">
			<table class="tauth" cellspacing="0" cellpadding="10">
				<tr>
					<th>Username</th>
					<td>
						<input type="text" class="input" name="username" id="username">
					</td>
				</tr>
				<tr>
					<th>Password</th>
					<td>
						<input type="password" class="input" name="password" id="password">
					</td>
				</tr>
				<tr>
					<th colspan="2" style="text-align: center;">
						<button type="submit" class="btn-auth" name="btn-login" id="btn-login">
							LOGIN
						</button>
					</th>
				</tr>
				<tr>
					<th colspan="2" style="text-align: center;">
						Belum memiliki akun ? 
						<a href="registrasi.php">Registrasi</a>
					</th>
				</tr>
			</table>
		</form>
	</div>

</body>
</html>