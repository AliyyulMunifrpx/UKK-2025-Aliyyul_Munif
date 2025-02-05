<?php
include "db/db.php";
include "include/header.php";
$peminjam = $_SESSION['peminjam_id'];
$pinjaman = mysqli_query($kon, "SELECT peminjaman.status,peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, peminjaman.id AS peminjaman_id, buku.id AS buku_id,buku.cover,kategori.kategori,kategori.id, buku.judul, buku.pengarang, buku.penerbit, buku.tahun 
FROM peminjaman
JOIN buku ON peminjaman.id_buku = buku.id
JOIN kategori ON buku.kategori_id=kategori.id
WHERE peminjaman.id_user='$peminjam'
AND peminjaman.status='dikembalikan'");

?>
<!-- <a href="hapusriwayat.php" class="text-lg font-bold bg-red-700 text-white px-2 py-2 rounded-xl mx-auto my-4">Hapus Seluruh Riwayat</a> -->
<table class="mx-auto my-4">
    <thead>
        <tr>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">No</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Cover</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Judul</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Penulis</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Penerbit</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Kategori</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Status</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Dipinjam Pada</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Dikembalikan Pada</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($buku = mysqli_fetch_assoc($pinjaman)) : ?>
            <tr>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $no++; ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><img src="cover/<?= $buku['cover'] ?>" style="width:70px; height:auto;"></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-blue-700 font-bold"><?= $buku['judul'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['pengarang'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['penerbit'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['kategori'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['status'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['tanggal_pinjam'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $buku['tanggal_kembali'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-green-700 font-bold">
                    <a href="ulasan.php?id_buku=<?= $buku['buku_id']; ?>">Berikan Ulasan</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>