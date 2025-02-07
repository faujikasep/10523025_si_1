<?php
include '../koneksi/koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO admin (username, password, nama) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sss", $username, $hashed_password, $nama);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect ke halaman login setelah berhasil registrasi
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Admin</title>
    <style>
       
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
}

.form-container {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 100%;
    max-width: 400px;
    color: #fff;
}

h2 {
    margin-bottom: 20px;
    font-size: 28px;
    font-weight: 600;
}

label {
    display: block;
    text-align: left;
    margin-bottom: 5px;
    font-size: 14px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
}

input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

button {
    width: 100%;
    padding: 12px;
    background: #4ca1af;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #2c3e50;
}

.back-link {
    display: block;
    margin-top: 15px;
    color: #fff;
    text-decoration: none;
    font-size: 14px;
    transition: 0.3s;
}

.back-link:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Registrasi Admin</h2>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
            
            <button type="submit" name="register">Registrasi</button>
        </form>
        <div class="link-container">
            <p> Apakah Sudah punya akun? <a href="login.php">Klik di sini untuk login</a></p>
        </div>
    </div>
</body>
</html>