<?php
// Sambungkan ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = "123"; // Ganti dengan password MySQL Anda
$database = "sqlinjection"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query SQL untuk memeriksa keberadaan pengguna
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Jika pengguna ditemukan, arahkan ke halaman selamat datang
    session_start();
    $_SESSION['username'] = $username;
    header("Location: welcome.php");
} else {
    // Jika pengguna tidak ditemukan, tampilkan pesan kesalahan
    echo "Username atau password salah.";
}

$conn->close();
?>
