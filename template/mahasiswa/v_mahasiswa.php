<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location: ../login.php");
	exit;
}

require "function_mhs.php";
$mahasiswa = read_mhs("SELECT * FROM t_mahasiswa ORDER BY nim ASC");

$jumlahDataPerhalaman = 3;
$jumlahData = count(read_mhs("SELECT * FROM t_mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset ($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;


$mahasiswa = read_mhs("SELECT * FROM t_mahasiswa LIMIT $awalData,               $jumlahDataPerhalaman");

if (isset ($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Mahasiswa</title>
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
	
	<div class="row-mhs" style="position: relative;top: 10px;left:10px;box-shadow: 0px 1px 4px black;padding:20px;">

		<div class="header-mhs">
			<center><h1>DATA MAHASISWA</h1></center>

			<div class="btn-mhs">
				<a href="tambah_mahasiswa.php">TAMBAH DATA MAHASISWA</a>
			</div>
		</div>

		<br>

		<!-- Cari Mahasiswa-->
		<form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus="" placeholder="Masukan Keyword Pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    	</form>

		<div class="body-mhs" style="margin-top: 10px;">
			<table cellspacing="0" cellpadding="20" border="1px" 
			style="width: 100%;">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>NAMA LENGKAP</th>
					<th>JURUSAN</th>
					<th>TTL</th>
					<th>JENIS KELAMIN</th>
					<th>ALAMAT</th>
					<th>NO HP</th>
					<th>EMAIL</th>
					<th>ACTION</th>
				</tr>

				<?php $no = 1; ?>
				<?php foreach ($mahasiswa as $mhs): ?>
					<tr>
						<td><?= $no + $awalData; ?></td>
						<td><?= $mhs['nim']; ?></td>
						<td><?= $mhs['nama_lengkap']; ?></td>
						<td><?= $mhs['jurusan']; ?></td>
						<td>
							<?= $mhs['tmpt_lahir']. ",".date("d-m-Y",strtotime($mhs['tgl_lahir'])); ?>
						</td>
						<td><?= $mhs['jenis_kelamin']; ?></td>
						<td><?= $mhs['alamat']; ?></td>
						<td><?= $mhs['no_hp']; ?></td>
						<td><?= $mhs['email']; ?></td>
						<td>
							<a href="edit_mahasiswa.php?nim=
							<?= $mhs ['nim'];?>"> EDIT </a>
							<hr>
							<a href="hapus_mahasiswa.php?nim=
							<?= $mhs['nim']; ?>" onclick="return confirm('YAKIN MENHAPUS DATA INI?')"> HAPUS </a>
						</td>
					</tr>
				<?php $no++; ?>
				<?php endforeach; ?>
			</table>
		</div>
	
	<!-- navigasi/pagination -->
	<center><h1>
		<?php if($halamanAktif > 1) : ?>
    	<a href="?halaman=<?=$halamanAktif - 1; ?>">&laquo;</a>
    	<?php endif; ?>

    	<?php for($i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
        	<?php if($i == $halamanAktif) : ?>
        	<a href="?halaman=<?= $i; ?>" 
			style="font-weight: bold; color: red;">
			<?= $i; ?></a>
        	<?php else : ?>
            	<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        	<?php endif; ?>
    	<?php endfor; ?>

    	<?php if($halamanAktif < $jumlahHalaman) : ?>
		<a href="?halaman=<?=$halamanAktif + 1; ?>">&raquo;</a>
    	<?php endif; ?>
	</h1></center>
</div>

</body>
</html>