<?php
include '../koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$namalengkap = $_POST['nama'];
$alamat = $_POST['alamat'];
$level = $_POST['level'];

$query = "INSERT INTO user (username, password, email, namalengkap, alamat, level) 
          VALUES ('$username', '$password', '$email', '$namalengkap', '$alamat', '$level')";
mysqli_query($connect, $query);

// Periksa jika query berhasil dijalankan
if(mysqli_affected_rows($connect) > 0) {
    echo '<script>
            alert("Menambahkan Akun Berhasil");
            window.location="anggota.php";
          </script>';
} else {
    echo '<script>
            alert("Gagal menambahkan akun. Silakan coba lagi.");
            window.location="register.php";
          </script>';
}

mysqli_close($connect);
?>
