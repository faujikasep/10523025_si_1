<?php
include "../koneksi/koneksi.php";

$queryMhs = "SELECT * FROM mahasiswa";
$resultMhs = mysqli_query($koneksi, $queryMhs);
$countMhs = mysqli_num_rows($resultMhs);
?>

<h3>DATA MAHASISWA</h3>
<br/><br/>
<a href="mahasiswaAdd.php"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA MAHASISWA"/></a>

<!-- TABEL MASTER MAHASISWA -->
<table class="table-mahasiswa">
    <thead>
        <tr>
            <th>NIM</th>
            <th>NAMA</th>
            <th>JENIS KELAMIN</th>
            <th>JURUSAN</th>
            <th>PASSWORD</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
<?php
if ($countMhs > 0) {
    while ($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)) {
        echo "<tr class='add'>";
        echo "<td class='value'>" . $dataMhs[0] . "</td>";
        echo "<td class='value'>" . $dataMhs[1] . "</td>";
        echo "<td class='value'>" . $dataMhs[2] . "</td>";
        echo "<td class='value'>" . $dataMhs[3] . "</td>";
        echo "<td class='value'>" . $dataMhs[4] . "</td>";
        echo "<td class='value'>
                <div class='aksi-buttons'>
                    <a href='mahasiswaEdit.php?nim=" . $dataMhs[0] . "' class='btn-edit'>Edit</a> 
                    <a href='mahasiswaDelete.php?nim=" . $dataMhs[0] . "' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                </div>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td colspan='6' align='center' height='20'>";
    echo "<div>Belum ada Data Mahasiswa</div>";
    echo "</td>";
    echo "</tr>";
}
echo "</tbody></table>";
?>

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

.table-mahasiswa {
    width: 90%;
    max-width: 1000px;
    margin: 20px auto;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.table-mahasiswa th, .table-mahasiswa td {
    padding: 14px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.table-mahasiswa th {
    background: #1976d2;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
}

.table-mahasiswa tr:nth-child(even) {
    background: #f7f7f7;
}

.table-mahasiswa tr:hover {
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

</style>