<?php
include "../db/db.php";
session_start();

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Laporan_Peminjaman_Buku.xls"');

$ambil = "SELECT peminjaman.status, buku.pengarang, buku.judul, buku.pengarang, buku.tahun, kategori.kategori, user.nama, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali
          FROM peminjaman
          JOIN user ON peminjaman.id_user=user.id
          JOIN buku ON peminjaman.id_buku=buku.id
          JOIN kategori ON buku.kategori_id=kategori.id";
$wadah = mysqli_query($kon, $ambil);

echo "<table border='1'>";
echo "<tr>";
echo "<th>No</th>";
echo "<th>Peminjam</th>";
echo "<th>Judul Buku</th>";
echo "<th>Pengarang</th>";
echo "<th>Status</th>";
echo "<th>Tanggal Pinjam</th>";
echo "<th>Tanggal Kembali</th>";
echo "<th>Kategori</th>";
echo "</tr>";

$no = 1;
while ($buku = mysqli_fetch_assoc($wadah)) {
    echo "<tr>";
    echo "<td>" . $no++ . "</td>";
    echo "<td>" . $buku['nama'] . "</td>";
    echo "<td>" . $buku['judul'] . "</td>";
    echo "<td>" . $buku['pengarang'] . "</td>";
    echo "<td>" . $buku['status'] . "</td>";
    echo "<td>" . $buku['tanggal_pinjam'] . "</td>";
    echo "<td>" . $buku['tanggal_kembali'] . "</td>";
    echo "<td>" . $buku['kategori'] . "</td>";
    echo "</tr>";
}
echo "</table>";
