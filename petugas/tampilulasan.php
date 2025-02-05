<?php
include "../db/db.php";
$id = $_GET['id_buku'];
$tampil = "SELECT ulasan.id, ulasan.ulasan,ulasan.rating,user.nama,buku.id,buku.judul
FROM ulasan
JOIN buku ON ulasan.id_buku=buku.id
JOIN user ON ulasan.id_user=user.id
WHERE ulasan.id_buku='$id'";
$wadah = mysqli_query($kon, $tampil);
?>
<table class="mx-auto my-4">
    <thead>
        <tr>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">OLEH</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">ULASAN</td>
            <td class="border border-blue-400 px-4 py-2 bg-blue-700 text-white">RATING</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($ulasan = mysqli_fetch_assoc($wadah)) : ?>

            <tr>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $ulasan['nama'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black"><?= $ulasan['ulasan'] ?></td>
                <td class="border border-blue-700 px-4 py-2 bg-white text-black">BINTANG <?= $ulasan['rating'] ?></td>

            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<a href="index.php">Kembali</a>