<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:../login.php");
	exit;
}

require 'function_mhs.php';
$nim = $_GET["nim"];
@$mhs = read_mhs("SELECT * FROM t_mahasiswa 
		WHERE nim = '$nim'")[0];

if (isset($_POST["btn-simpan"])) {

	// var_dump($_POST);
	if (edit_mhs($_POST) > 0) {
		echo "<script>
			alert('Data Berhasil Diedit!!');
			window.location.href = 'v_mahasiswa.php';
			</script>";
	} else {
		echo "<script>
			alert('Data Gagal Diedit!!');
			window.location.href = 'v_mahasiswa.php';
			</script>";
	} 
}

if(isset($_POST["btn-batal"])) {
	header("Location:v_mahasiswa.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Edit Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

	<div class="row-mhs" style="position: relative;top: 10px;left:10px;bottom:10px;box-shadow: 0px 1px 4px black;padding:20px;margin-bottom: 100px;">
		<div class="header-mhs">
			<h2 align="center">FORM EDIT MAHASISWA</h2>
		</div>

	<div class="body-mhs" style="margin-top: 10px;width: 50%;margin: auto;padding:20px;border: 3px solid #ffc400;">

		<form name="edit_mhs" class="edit_mhs" action="" method="post">
		<input class="form-input" type="hidden" name="nim" value="<?= @$mhs["nim"];?>">	
			
			<table cellspacing="0" cellpadding="20" style="width: 100%;">
					<h1><?= $mhs['nim'] ?> </h1>
					<tr>
						<td>
							<label for="nama_lengkap">NAMA LENGKAP :</label>
						</td>
						<td>
							<input class="form-input" type="text" name="nama_lengkap" id="nama_lengkap" require 
							value="<?= @$mhs["nama_lengkap"]?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="jurusan">JURUSAN :</label>
						</td>
						<td>
							<select class="form-input-select" name="jurusan" id="jurusan" require value="<?= @$mhs["jurusan"]?> ">
								<option <?php if(@$mhs["jurusan"] == "Pilih"){echo "selected";} ?>>
									------ </option>
								<option <?php if(@$mhs["jurusan"] == "TEKNIK INDUSTRI"){echo "selected";} ?>>
									TEKNIK INDUSTRI </option>
								<option <?php if(@$mhs["jurusan"] == "TEKNIK INFORMATIKA"){echo "selected";} ?>>
									TEKNIK INFORMATIKA</option>
								<option <?php if(@$mhs["jurusan"] == "TEKNIK MESIN"){echo "selected";} ?>>
									TEKNIK MESIN</option>
								<option <?php if(@$mhs["jurusan'"] == "TEKNIK ELEKTRO"){echo 'selected';} ?>>
									TEKNIK ELEKTRO</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="tmpt_lahir">TEMPAT LAHIR :</label>
						</td>
						<td>
							<input class="form-input" type="text" name="tmpt_lahir" id="tmpt_lahir" require 
							value="<?= @$mhs["tmpt_lahir"]?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="tgl_lahir">TANGGAL LAHIR :</label>
						</td>
						<td>
							<input class="form-input" type="date" name="tgl_lahir" id="tgl_lahir" require 
							value="<?= @$mhs["tgl_lahir"]?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="jenis_kelamin">JENIS KELAMIN :</label>
						</td>
						<td>
							<select class="form-input-select" name="jenis_kelamin" id="jenis_kelamin">
								<option <?php if(@$mhs["jenis_kelamin"] == 'PILIH'){echo 'selected';} ?>>
									------</option>
								<option <?php if(@$mhs["jenis_kelamin"] == 'LAKI-LAKI'){echo 'selected';} ?>>
									LAKI-LAKI</option>
								<option <?php if(@$mhs["jenis_kelamin"] == 'PEREMPUAN'){echo 'selected';} ?>>
									PEREMPUAN</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="alamat">ALAMAT :</label>
						</td>
						<td>
							<input class="form-input-area" name="alamat" id="alamat" require value="<?= @$mhs["alamat"]?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="no_hp">NO HP :</label>
						</td>
						<td>
							<input class="form-input" type="number" name="no_hp" id="no_hp" require 
							value="<?= @$mhs["no_hp"]?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="email">EMAIL :</label>
						</td>
						<td>
							<input class="form-input" type="email" name="email" id="email" require value="<?= @$mhs["email"]?>">
						</td>
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

</body>
</html>