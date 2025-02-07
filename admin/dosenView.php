<?php
include "../koneksi/koneksi.php";

$queryDosen = "SELECT * FROM dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);
?>

<h3>Data Dosen</h3>
<hr/>
<a href="dosenAdd.php"><button class="buttonadm">Tambah Data Dosen</button></a>
<br><br>

<table class="table">
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Kode Matkul</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($dataDosen = mysqli_fetch_assoc($resultDosen)) {
        ?>
        <tr>
            <td><?php echo $dataDosen['nip']; ?></td>
            <td><?php echo $dataDosen['nama']; ?></td>
            <td><?php echo $dataDosen['kode_matkul']; ?></td>
            <td>
                <a href="dosenEdit.php?nip=<?php echo $dataDosen['nip']; ?>" class="btn-edit">Edit</a> |
                <a href="dosenHapus.php?nip=<?php echo $dataDosen['nip']; ?>" class="btn-delete">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<style>
    
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 20px;
}

h3 {
    color: white;
    font-size: 28px;
    text-align: center;
    margin-bottom: 20px;
    text-transform: uppercase;
}

.buttonadm {
    padding: 12px 24px;
    background: #ff9800;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: 0.3s;
    display: block;
    margin: 20px auto;
    text-align: center;
    text-decoration: none;
}

.buttonadm:hover {
    background: #e68900;
}

.table {
    width: 90%;
    max-width: 1000px;
    margin: 20px auto;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.table th, .table td {
    padding: 14px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.table th {
    background: #1976d2;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
}

.table tr:nth-child(even) {
    background: #f7f7f7;
}

.table tr:hover {
    background: #e0e0e0;
    transition: 0.3s;
}

.aksi-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.btn-edit, .btn-delete {
    padding: 8px 16px;
    font-size: 14px;
    text-decoration: none;
    color: white;
    border-radius: 5px;
    font-weight: bold;
    transition: all 0.3s;
    text-align: center;
}

.btn-edit {
    background: #4caf50;
}

.btn-delete {
    background: #f44336;
}

.btn-edit:hover {
    background: #388e3c;
}

.btn-delete:hover {
    background: #d32f2f;
}

.btn-edit:active, .btn-delete:active {
    transform: scale(0.95);
}

hr {
    border: 1px solid #ddd;
    width: 80%;
}

</style>