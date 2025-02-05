<?php
include "db/db.php";
session_start();
include "include/header.php";
$peminjam = $_SESSION['peminjam_id'];
$pinjaman = mysqli_query($kon, "SELECT peminjaman.status, peminjaman.id AS peminjaman_id, buku.id AS buku_id, buku.judul, buku.pengarang, buku.penerbit, buku.tahun , kategori.kategori
FROM peminjaman
JOIN buku ON peminjaman.id_buku = buku.id
JOIN kategori ON buku.kategori_id=kategori.id
WHERE peminjaman.id_user='$peminjam'
AND peminjaman.status='dikembalikan'");


?>

<table class="mx-auto my-4">
    <thead>
        <tr>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">No</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Judul</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Cover</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Penulis</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Penerbit</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Status</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Kategori</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($buku = mysqli_fetch_assoc($pinjaman)) : ?>
            <tr>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $no++; ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['judul'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['pengarang'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['penerbit'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['status'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['kategori'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-green-700 font-bold">
                    <a href="kembalikan.php?id_pjm=<?= $buku['peminjaman_id']; ?>">Kembalikan</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>