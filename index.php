<?php
include "db/db.php";
include "include/header.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['peminjam_id']) || $_SESSION['peminjam_role'] !== 'peminjam') {
    header('Location: login.php?status=unauthorized');
    exit();
}

$ambil = "SELECT buku.judul, buku.pengarang, buku.penerbit, buku.tahun, kategori.kategori, buku.cover, buku.id
          FROM buku
          JOIN kategori ON buku.kategori_id = kategori.id";
$wadah = mysqli_query($kon, $ambil);
?>
<table class="mx-auto my-4">
    <thead>
        <tr>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">No</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Cover</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Judul</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Penulis</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Penerbit</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Kategori</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Tahun</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($buku = mysqli_fetch_assoc($wadah)) : ?>
            <tr>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $no++; ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><img src="cover/<?= $buku['cover'] ?>" style="width:70px; height:auto;"></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-blue-700 font-bold"><?= $buku['judul'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['pengarang'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['penerbit'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['kategori'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['tahun'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-green-700 font-bold">
                    <a href="pinjam.php?id_buku=<?= $buku['id']; ?>">PINJAM</a>
                    <a href="tampilulasan.php?id_buku=<?= $buku['id']; ?>" class=" text-blue-700 font-bold">LIHAT ULASAN</a>
                    <a href="favorit.php?id_buku=<?= $buku['id']; ?>" class=" text-pink-700 font-bold">JADIIN AKU FAVORIT</a>
                </td>

            </tr>
        <?php endwhile; ?>
    </tbody>
</table>