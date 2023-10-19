<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:../login.php");
	exit;
}

require 'function_mhs.php';
if (isset($_POST["btn-simpan"])) {
	if (tambah_mhs($_POST) > 0) {
		echo "<script>
			alert('Data Berhasil DiTambahkan!!');
			window.location.href = 'v_mahasiswa.php';
			</script>";
	}else{
		echo "<script>
			alert('Data Gagal DiTambahkan!!');
			window.location.href = 'v_mahasiswa.php';
			</script>";
	}
}

if (isset($_POST["btn-batal"])) {
	header("location: v_mahasiswa.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="navbar">
		<ul class="nav">
			<li class="nav-item"><a href="../index.php">Home</a></li>
			<li class="nav-item"><a href="v_mahasiswa.php">Mahasiswa</a></li>
			<li class="nav-item"><a href="../logout.php">Logout</a></li>

		</ul>
	</div>
	
	<div class="row-mhs" style="position: relative;top: 10px;left:10px;bottom:10px;box-shadow: 0px 1px 4px black;padding:20px;margin-bottom: 100px;">
		<div class="header-mhs">
			<h2 align="center">FORM TAMBAH MAHASISWA</h2>
		</div>
		<div class="body-mhs" style="margin-top: 10px;width: 50%;margin: auto;padding:20px;border: 3px solid #ffc400;">
			<form name="tambah_mhs" class="tambah_mhs" action="" method="POST">
				<table cellspacing="0" cellpadding="20" style="width: 100%;">
					<tr>
						<td><label for="nim">NIM :</label></td>
						<td><input class="form-input" type="number" name="nim" id="nim" require=""></td>
					</tr>
					<tr>
						<td><label for="nama_lengkap">NAMA LENGKAP :</label></td>
						<td><input class="form-input" type="text" name="nama_lengkap" id="nama_lengkap" require=""></td>
					</tr>
					<tr>
						<td><label for="jurusan">JURUSAN :</label></td>
						<td><select class="form-input-select" name="jurusan" id="jurusan" require="">
								<option>----</option>
								<option>TEKNIK INDUSTRI</option>
								<option>TEKNIK INFORMATIKA</option>
								<option>TEKNIK MESIN</option>
								<option>TEKNIK ELEKTRO</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="tmpt_lahir">TEMPAT LAHIR :</label></td>
						<td><input class="form-input" type="text" name="tmpt_lahir" id="tmpt_lahir" require=""></td>
					</tr>
					<tr>
						<td><label for="tgl-lahir">TANGGAL LAHIR :</label></td>
						<td><input class="form-input" type="date" name="tgl_lahir" id="tgl_lahir"></td>
					</tr>
					<tr>
						<td><label for="jenis_kelamin">JENIS KELAMIN :</label></td>
						<td><select class="form-input-select" name="jenis_kelamin" id="jenis_kelamin"  require="">
								<option>----</option>
								<option>LAKI-LAKI</option>
								<option>PEREMPUAN</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="alamat">ALAMAT :</label></td>
						<td><textarea class="form-input-area" name="alamat" id="alamat"></textarea></td>
					</tr>
					<tr>
						<td><label for="no_hp">NO HP :</label></td>
						<td><input class="form-input" type="number" name="no_hp" id="no_hp" require=""></td>
					</tr>
					<tr>
						<td><label for="email">EMAIL :</label></td>
						<td><input class="form-input" type="email" name="email" id="email" require=""></td>
					</tr>
					<tr>
						<td align="left">
							<button type="submit" class="btn" name="btn-simpan">SIMPAN</button>
						</td>
						<td align="right">
							<button type="submit" class="btn" name="btn-batal">BATAL</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>

	<div class="footer">
		<p><i>Copyright:Himatif_Bootcamp_2023</i></p>	
	</div>

</body>
</html>