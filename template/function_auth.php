<?php
require "koneksi.php";

function registrasi($data) {
    global $conn;
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn,$data['password']);
    $result = mysqli_query($conn,"SELECT username FROM t_user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<Script>
                alert('Username Sudah Terdaftar');
                </script>";
        
        return false;
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO t_user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>