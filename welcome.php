<?php
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>
<body>
    <h2>Selamat datang, <?php echo $username; ?>!</h2>
<form action="#" method="get">
  <label for="input">Cari file:</label><br>
  <input type="text" id="input" name="input"><br><br>
  <input type="submit" value="Submit">
</form>

<?php
if(isset($_GET['input'])) {
  $input = $_GET['input'];
  echo "<p>File: $input! tidak dapat ditemukan</p>"; // Vulnerable code, reflects input directly to the page
}
?>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
