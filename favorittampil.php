<?php
include "db/db.php";
include "include/header.php";
$peminjam = $_SESSION['peminjam_id'];
$pinjaman = mysqli_query($kon, "SELECT buku.judul,buku.id AS buku_id,buku.cover,buku.pengarang,buku.penerbit,favorit.id,favorit.id_buku,favorit.id_user
FROM favorit
JOIN buku ON favorit.id_buku= buku.id
JOIN user ON favorit.id_user=user.id
WHERE favorit.id_user='$peminjam'
");

?>
<a href="hapusseluruhfavorit.php" class="text-lg font-bold bg-red-700 text-white px-2 py-2 rounded-xl mx-auto my-4">Hapus Seluruh Favorit</a>
<table class="mx-auto my-4">
    <thead>
        <tr>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">No</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Judul</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Cover</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Penulis</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Penerbit</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($buku = mysqli_fetch_assoc($pinjaman)) : ?>
            <tr>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $no++; ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['judul'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><img src="cover/<?= $buku['cover'] ?>" style="width:70px; height:auto;"></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['pengarang'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['penerbit'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-green-700 font-bold">
                    <a href="hapusfavorit.php?id_buku=<?= $buku['buku_id']; ?>">Hapus Favorit</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>