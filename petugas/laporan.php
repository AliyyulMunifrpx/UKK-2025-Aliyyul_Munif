<?php
include "../db/db.php";
session_start();
include "../include/headerpetugas.php";
$ambil = "SELECT peminjaman.status, buku.pengarang,buku.judul,buku.cover, buku.pengarang, buku.tahun, kategori.id, kategori.kategori, user.nama, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali
          FROM peminjaman
          JOIN user ON peminjaman.id_user=user.id
          JOIN buku ON peminjaman.id_buku=buku.id
          JOIN kategori ON buku.kategori_id=kategori.id";
$wadah = mysqli_query($kon, $ambil);
?>
<a href="generete.php" class="text-lg font-bold bg-blue-700 text-white px-2 py-2 rounded-xl mx-auto my-4">Export Laporan Ke Excel</a>
<table class="mx-auto my-4">
    <thead>
        <tr>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">No</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Peminjam</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Judul Buku</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Pengarang</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Satus</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Tanggal Pinjam</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Tanggal Kembali</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Kategori</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($buku = mysqli_fetch_assoc($wadah)) : ?>
            <tr>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $no++; ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['nama']; ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['judul']; ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['pengarang']; ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['status']; ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['tanggal_pinjam']; ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['tanggal_kembali']; ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['kategori']; ?></td>
            </tr>
    </tbody>
<?php endwhile ?>
</table>