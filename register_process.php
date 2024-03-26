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

// Ambil data dari form pendaftaran
$username = $_POST['username'];
$password = $_POST['password'];

// Query SQL untuk memeriksa apakah username sudah ada
$sql_check = "SELECT * FROM users WHERE username='$username'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Jika username sudah ada, tampilkan pesan kesalahan
    echo "Username sudah digunakan. Silakan coba dengan username yang lain.";
} else {
    // Jika username belum ada, tambahkan pengguna ke database
    $sql_insert = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Pendaftaran berhasil! Silakan <a href='login.php'>login</a>.";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

$conn->close();
?>
