<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../db/db.php";
session_start();
include "../include/headerpetugas.php";
if (!isset($_SESSION['petugas_id'])) {
    header('Location: login.php?status=success');
    exit();
}
$ambil = "SELECT buku.judul, buku.pengarang, buku.penerbit, buku.tahun, kategori.id, kategori.kategori, buku.id,buku.cover
          FROM buku
          JOIN kategori ON buku.kategori_id=kategori.id";
$wadah = mysqli_query($kon, $ambil);
?>
<a href="tambah.php" class="text-lg font-bold bg-blue-700 text-white px-2 py-2 rounded-xl mx-auto my-4">Tambah Buku</a>
<table class="mx-auto my-4">
    <thead>
        <tr>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">No</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Cover</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Judul</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Penulis</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Penerbit</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Tahun</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Kategori</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($buku = mysqli_fetch_assoc($wadah)) : ?>
            <tr>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $no++; ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black">
                    <img src="../cover/<?= $buku['cover'] ?>" style="width: 70px; height: auto;">
                </td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['judul'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['pengarang'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['penerbit'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['tahun'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['kategori'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><a href="../petugas/edit.php?id_buku=<?= $buku['id']; ?>" class="text-lg font-bold text-green-700">Edit</a> <a href="../petugas/hapus.php?id_buku=<?= $buku['id']; ?>" class="text-lg font-bold text-red-700">Hapus</a></td>
            </tr>
    </tbody>
<?php endwhile ?>
</table>