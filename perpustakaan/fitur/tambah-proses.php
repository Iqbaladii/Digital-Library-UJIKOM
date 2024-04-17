<?php
include '../koneksi.php';

$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$stok = $_POST['stok'];

$namafoto = $_FILES['gambar']['name'];
$ukuranfoto = $_FILES['gambar']['size'];
$tipefoto = $_FILES['gambar']['type'];
$tmp = $_FILES['gambar']['tmp_name'];

$acc = ['image/png','image/jpeg','image/jpg'];
if (!in_array($tipefoto,$acc)){
    echo '<script>alert("Hanya file PNG JPG dan JPEG yang diperbolehkan"); window.history.back(); </script>';
    die();
}
$size = 2 * 1024 *1024;
if($ukuranfoto > $size){
    echo '<script>alert("Maaf ukuran file anda terlalu besar"); window.history.back(); </script>';
    die();
}

$lokasifoto = '../assets/img/' . $namafoto;
move_uploaded_file($tmp, $lokasifoto);

$query = "INSERT INTO buku (judul, kategoriid, penulis, penerbit, tahunterbit, stok, gambar) 
          VALUES ('$judul', '$kategori', '$penulis', '$penerbit', '$tahun', '$stok', '$lokasifoto')";
mysqli_query($connect, $query);
if(mysqli_affected_rows($connect) > 0) {
    echo '<script>
            alert("Menambahkan Buku Berhasil");
            window.location="buku.php";
          </script>';
} else {
    echo '<script>
            alert("Gagal menambahkan buku. Silakan coba lagi.");
            window.location="tambah.php";
          </script>';
}
?>
