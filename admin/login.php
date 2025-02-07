<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include '../koneksi/koneksi.php';

if (isset($_SESSION['admin'])) {
    header('Location: ./?adm=mahasiswa');
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        if (password_verify($password, $data['password'])) {
            $_SESSION['admin'] = $data['username'];
            $_SESSION['nama'] = $data['nama'];
            session_regenerate_id(true);
            header('Location: ./?adm=mahasiswa');
            exit;
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!');</script>";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        /* Reset dasar */
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
        <h2>Login Admin</h2>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            
            <button type="submit" name="login">Login</button>
        </form>
        <a href="admin.php" class="back-link">Registrasi</a>
    </div>
</body>
</html>