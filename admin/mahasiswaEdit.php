<?php
include ('../koneksi/koneksi.php');

$getNim = $_GET['nim'];
$editMhs = "SELECT * FROM mahasiswa WHERE nim = '$getNim'";
$resultMhs = mysqli_query($koneksi, $editMhs);
$dataMhs = mysqli_fetch_array($resultMhs);
?>

<h3>UBAH DATA MAHASISWA</h3>
<br /><br />
<?php
if (!isset($_POST['submit'])) {
?>
<form enctype="multipart/form-data" method="post" class="form-ubah-mahasiswa">
    <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" value="<?php echo $dataMhs['nim'] ?>" readonly="readonly"/>
    </div>
    
    <div class="form-group">
        <label for="nama">NAMA</label>
        <input name="nama" type="text" id="nama" value="<?php echo $dataMhs['nama'] ?>" />
    </div>

    <div class="form-group">
        <label>JENIS KELAMIN</label>
        <div class="radio-group">
            <label>
                <input type="radio" name="jk" value="Laki-Laki" <?php echo ($dataMhs['jk'] == 'Laki-Laki') ? 'checked' : ''; ?>> Laki-Laki
            </label>
            <label>
                <input type="radio" name="jk" value="Perempuan" <?php echo ($dataMhs['jk'] == 'Perempuan') ? 'checked' : ''; ?>> Perempuan
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="jur">JURUSAN</label>
        <select name="jur" id="jur">
            <option value="<?php echo $dataMhs['jur']; ?>" selected><?php echo $dataMhs['jur']; ?></option>
            <option value="">--PILIH--</option>
            <option value="Sistem Informasi">SISTEM INFORMASI</option>
            <option value="Teknik Informatika">TEKNIK INFORMATIKA</option>
            <option value="Teknik Komputer">TEKNIK KOMPUTER</option>
        </select>
    </div>

    <div class="form-group">
        <label for="password">PASSWORD</label>
        <input type="password" name="password" id="password" value="<?php echo $dataMhs['password'] ?>" />
    </div>

    <div class="form-group">
        <button type="submit" name="submit" class="btn-submit">UBAH</button>
    </div>
</form>
<?php
}
else {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jur = $_POST['jur'];
    $password = md5($_POST['password']);

    $updateMhs = "UPDATE mahasiswa SET nama='$nama', jk='$jk', jur='$jur', password='$password' WHERE nim='$nim'";
    $queryMhs = mysqli_query($koneksi, $updateMhs);

    if ($queryMhs) {
        echo "<script>alert('Data Berhasil Diubah !');</script>";
        echo "<script type='text/javascript'>window.location='./?adm=mahasiswa';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah !');</script>";
        echo "<script type='text/javascript'>window.location='mahasiswaView.php';</script>";
    }
}
?>
<div class="back-button">
    <a href="./?adm=mahasiswa" class="btn-back">KEMBALI</a>
</div>

<style>
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7fc;
    margin: 0;
    padding: 0;
    color: #444;
}

h3 {
    font-size: 28px;
    text-align: center;
    color: #2c3e50;
    margin-bottom: 40px;
}

.form-ubah-mahasiswa {
    width: 50%;
    margin: 0 auto;
    padding: 30px;
    background-color: #fff;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
}

.form-ubah-mahasiswa:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 40px rgba(0, 0, 0, 0.15);
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
    color: #34495e;
}

.form-group input, .form-group select {
    width: 100%;
    padding: 14px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fafafa;
    transition: all 0.3s ease-in-out;
}

.form-group input:focus, .form-group select:focus {
    border-color: #3498db;
    background-color: #fff;
    outline: none;
}

.form-group input[type="radio"] {
    width: auto;
    margin-right: 10px;
}

.radio-group label {
    margin-right: 20px;
    font-size: 16px;
}

.form-group button {
    width: 100%;
    padding: 14px;
    font-size: 18px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.form-group button:hover {
    background-color: #2980b9;
    transform: scale(1.05);
}

.form-group button:active {
    background-color: #1c6ea4;
}

.back-button {
    text-align: center;
    margin-top: 30px;
}

.btn-back {
    padding: 12px 24px;
    font-size: 16px;
    background-color: #7f8c8d;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

.btn-back:hover {
    background-color: #95a5a6;
}

@media (max-width: 768px) {
    .form-ubah-mahasiswa {
        width: 80%;
    }
}

</style>