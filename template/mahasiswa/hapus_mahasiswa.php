<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:../login.php");
}
require "function_mhs.php";
$nim = $_GET['nim'];

    if (hapus_mhs($nim) > 0) {
        echo "<script>
            alert('Data Berhasil Dihapus!!');
            window.location.href = 'v_mahasiswa.php';
                </script>";
    } else {
        echo "<script>
            alert('Data Gagal Dihapus!!');
            window.location.href = 'v_mahasiswa.php';
                </script>";
    }
?>