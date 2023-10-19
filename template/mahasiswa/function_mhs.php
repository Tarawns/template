<?php
require "../koneksi.php";

// Tambah
function tambah_mhs($data) {
    global $conn;

    $nim            = htmlspecialchars($data["nim"]);
    $nama_lengkap   = htmlspecialchars($data["nama_lengkap"]);
    $jurusan        = htmlspecialchars($data["jurusan"]);
    $tmpt_lahir     = htmlspecialchars($data["tmpt_lahir"]);
    $tgl_lahir      = $data["tgl_lahir"];
    $jenis_kelamin  = htmlspecialchars($data["jenis_kelamin"]);
    $alamat         = htmlspecialchars($data["alamat"]);
    $no_hp          = htmlspecialchars(strval($data["no_hp"]));
    $email          = htmlspecialchars($data["email"]);

    $result_mahasiswa = mysqli_query($conn, "SELECT * FROM t_mahasiswa WHERE nim = '$nim'");
    $cek = mysqli_num_rows($result_mahasiswa);

    // MELAKUKAN PENGECEKAN APAKAH PRODUK SUDAH ADA DI DATABASE
    if ($cek > 0) {
        echo "<script>
                alert('Data Sudah Ada!!');
                window.location.href = 'v_mahasiswa.php';
            </script>";
        exit;
    }
    $query = "INSERT INTO t_mahasiswa VALUES 
                ('$nim', '$nama_lengkap', '$jurusan', '$tmpt_lahir', '$tgl_lahir', '$jenis_kelamin', '$alamat','$no_hp', '$email')";

    mysqli_query ($conn,$query);
    return mysqli_affected_rows($conn);
}

function read_mhs($query) {
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Edit
function edit_mhs($data) {
    global $conn;

    $nim_lama       = htmlspecialchars($data["nim_lama"]);
    $nim            = htmlspecialchars($data["nim"]);
    $nama_lengkap   = htmlspecialchars($data["nama_lengkap"]);
    $jurusan        = htmlspecialchars($data["jurusan"]);
    $tmpt_lahir     = htmlspecialchars($data["tmpt_lahir"]);
    $tgl_lahir      = $data["tgl_lahir"];
    $jenis_kelamin  = htmlspecialchars($data["jenis_kelamin"]);
    $alamat         = htmlspecialchars($data["alamat"]);
    $no_hp          = htmlspecialchars(strval($data["no_hp"]));
    $email          = htmlspecialchars($data["email"]);

    $query = "UPDATE t_mahasiswa SET
                nim             = '$nim',
                nama_lengkap    = '$nama_lengkap',
                jurusan         = '$jurusan',
                tmpt_lahir      = '$tmpt_lahir',
                tgl_lahir       = '$tgl_lahir',
                jenis_kelamin   = '$jenis_kelamin',
                alamat          = '$alamat',
                no_hp           = '$no_hp',
                email           = '$email'
                WHERE nim  = $nim_lama
                        ";

    mysqli_query($conn, $query);

    return mysqli_afffected_rows($conn);
}

// cari data
// nama LIKE '%$keyword%' => mencari data dengan fleksibel
function cari($keyword) {
    $query = "SELECT * FROM t_mahasiswa WHERE
                nim           LIKE '%$keyword%' OR
                nama_lengkap  LIKE '%$keyword%' OR
                jurusan       LIKE '%$keyword%' OR
                tmpt_lahir    LIKE '%$keyword%' OR
                tgl_lahir     LIKE '%$keyword%' OR
                jenis_kelamin LIKE '%$keyword%' OR
                alamat        LIKE '%$keyword%' OR
                no_hp         LIKE '%$keyword%' OR
                email         LIKE '%$keyword%'
            ";
    return read_mhs($query);
}

// Hapus
function hapus_mhs($nim) {
    global $conn;
    mysqli_query($conn, "DELETE FROM t_mahasiswa WHERE nim = '$nim' ");
    return mysqli_affected_rows($conn);
}


?>