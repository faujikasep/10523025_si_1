<?php
include "../koneksi/koneksi.php";

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];

    $query = "SELECT * FROM dosen WHERE nip = '$nip'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    
    if (!$data) {
        echo "<script>alert('Data dosen tidak ditemukan'); window.location='dosenView.php';</script>";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kode_mtkul = mysqli_real_escape_string($koneksi, $_POST['kode_matkul']);
    $password = $_POST['password'] ? md5($_POST['password']) : $data['password'];

    $queryUpdate = "UPDATE dosen SET nama = '$nama', kode_matkul = '$kode_matkul', password = '$password' WHERE nip = '$nip'";

    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>alert('Data berhasil diubah'); window.location='./?adm=dosenView';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<h3>Edit Data Dosen</h3>
<hr/>
<form method="post" action="dosenEdit.php?nip=<?php echo $nip; ?>" class="form-container">
    <label for="nip">NIP:</label>
    <input type="text" name="nip" value="<?php echo $data['nip']; ?>" readonly class="input-field" />
    
    <label for="nama">Nama:</label>
    <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required class="input-field" />
    
    <label for="kode_matkul">Kode Mata Kuliah:</label>
    <input type="text" name="kode_matkul" value="<?php echo $data['kode_matkul']; ?>" required class="input-field" />
    
    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="Kosongkan jika tidak ingin diubah" class="input-field" />
    
    <div class="button-group">
        <input type="submit" value="Update" class="submit-btn" />
        <a href="./?adm=home"><button type="button" class="cancel-btn">Kembali</button></a>
    </div>
</form>

<style>
   body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7fc;
    margin: 0;
    padding: 0;
    color: #444;
}

h3 {
    font-size: 32px;
    text-align: center;
    color: #2c3e50;
    margin-bottom: 50px;
    font-weight: bold;
    letter-spacing: 1px;
}

.form-container {
    width: 60%;
    margin: 0 auto;
    padding: 40px;
    background-color: #ffffff;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border-radius: 16px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.form-container:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
}

.form-container label {
    font-size: 18px;
    font-weight: 500;
    color: #555;
    margin-bottom: 10px;
    display: block;
}

.input-field {
    width: 100%;
    padding: 14px 20px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f8f8f8;
    margin-bottom: 20px;
    transition: all 0.3s ease-in-out;
}

.input-field:focus {
    border-color: #3498db;
    background-color: #fff;
    outline: none;
}

.input-field::placeholder {
    color: #ccc;
}

.button-group {
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

.submit-btn, .cancel-btn {
    padding: 14px 24px;
    font-size: 16px;
    border-radius: 8px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.submit-btn {
    background-color: #3498db;
    color: white;
    border: none;
}

.submit-btn:hover {
    background-color: #2980b9;
    transform: scale(1.05);
}

.cancel-btn {
    background-color: #95a5a6;
    color: white;
    border: none;
    text-decoration: none;
    display: inline-block;
}

.cancel-btn:hover {
    background-color: #7f8c8d;
    transform: scale(1.05);
}

.cancel-btn:active {
    background-color: #5f6a6a;
}

@media (max-width: 768px) {
    .form-container {
        width: 80%;
        padding: 25px;
    }

    h3 {
        font-size: 28px;
    }
}


</style>
