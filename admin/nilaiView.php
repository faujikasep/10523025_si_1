<?php
include "../koneksi/koneksi.php";

$queryNilai = "SELECT 
    m.nim, 
    m.nama, 
    n.nl_tugas, 
    n.nl_uts, 
    n.nl_uas,
    (0.2 * n.nl_tugas) + (0.4 * n.nl_uts) + (0.4 * n.nl_uas) AS nilai_akhir,
    d.nip, 
    d.nama AS nama_dosen
FROM nilai n
LEFT JOIN mahasiswa m ON n.nim = m.nim
LEFT JOIN dosen d ON n.nip = d.nip";

$resultNilai = mysqli_query($koneksi, $queryNilai);
$countNilai = mysqli_num_rows($resultNilai);
?>

<h3><b>DATA NILAI</b></h3>
<hr/><br />
<a href="nilaiAdd.php"><button class="buttonadm"><b>TAMBAH DATA NILAI</b></button></a>
<br><br>

<table class="data-table">
    <thead>
        <tr>
            <th><b>NIM</b></th>
            <th><b>NAMA</b></th>
            <th><b>TUGAS</b></th>
            <th><b>UTS</b></th>
            <th><b>UAS</b></th>
            <th><b>NILAI AKHIR</b></th>
            <th><b>DOSEN</b></th>
            <th><b>AKSI</b></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($countNilai > 0) {
            while ($dataNilai = mysqli_fetch_array($resultNilai, MYSQLI_NUM)) {
                ?>
                <tr>
                    <td><b><?php echo $dataNilai[0]; ?></b></td>
                    <td><b><?php echo $dataNilai[1]; ?></b></td>
                    <td><b><?php echo $dataNilai[2]; ?></b></td>
                    <td><b><?php echo $dataNilai[3]; ?></b></td>
                    <td><b><?php echo $dataNilai[4]; ?></b></td>
                    <td><b><?php echo number_format($dataNilai[5], 2); ?></b></td>
                    <td><b><?php echo $dataNilai[7]; ?></b></td>
                    <td>
                        <a href="nilaiEdit.php?nim=<?php echo $dataNilai[0]; ?>&nip=<?php echo $dataNilai[6]; ?>" class="btn-edit"><b>Edit</b></a> |
                        <a href="nilaiHapus.php?nim=<?php echo $dataNilai[0]; ?>&nip=<?php echo $dataNilai[6]; ?>" class="btn-delete"><b>Hapus</b></a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "
            <tr>
                <td colspan='8' align='center' height='20'>
                    <div><b>Belum ada Data Nilai</b></div>
                </td>
            </tr>";
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

.data-table {
    width: 90%;
    max-width: 1000px;
    margin: 20px auto;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.data-table th, .data-table td {
    padding: 14px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.data-table th {
    background: #1976d2;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
}

.data-table tr:nth-child(even) {
    background: #f7f7f7;
}

.data-table tr:hover {
    background: #e0e0e0;
    transition: 0.3s;
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

@media (max-width: 768px) {
    .data-table {
        width: 100%;
    }

    .data-table th, .data-table td {
        padding: 10px;
    }

    .buttonadm {
        width: 100%;
        margin-bottom: 15px;
    }
}

</style>