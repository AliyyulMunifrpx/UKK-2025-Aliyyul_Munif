<?php
include "db/db.php";
include "include/style.php";
session_start();
$id_user = $_SESSION['peminjam_id'];
$id_buku = $_GET['id_buku'];
$ambil = "SELECT peminjaman.id, user.id,user.nama,buku.id,buku.judul
 FROM peminjaman
 JOIN buku ON peminjaman.id_buku=buku.id
 JOIN user ON peminjaman.id_user=user.id
  WHERE buku.id='$id_buku'
  AND user.id='$id_user'";
$wadah = mysqli_query($kon, $ambil);
$hasil = mysqli_fetch_assoc($wadah);
if (isset($_POST['submit'])) {
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    $masuk = "INSERT INTO ulasan(id_user, id_buku, ulasan, rating) VALUES ('$id_user', '$id_buku', '$ulasan', '$rating')";

    if (mysqli_query($kon, $masuk)) {
        header('Location:index.php?status=success');
        exit();
    } else {
        echo "Error: " . mysqli_error($kon);
    }
}
?>
<div class="bg-white text-white px-2 py-2 rounded-xl mx-auto my-4 border border-blue min-h-screen flex flex-col" style="width: 500px; height:200px;">
    <h1 class="mt-10 text-black mx-auto text-lg ">Berikan Ulasan Untuk <?= $hasil['judul']; ?>
        <form action="" method="POST">
            <input name="ulasan" type="text" placeholder="Masukkan ulasanmu" class="w-full mt-5 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
            <select name="rating" class="max-w-30 mt-5 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button type="submit" name="submit" style="width: 412px;" class="bg-blue-500 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">Kirim Ulasan Sebagai <?= $hasil['nama']; ?></button>
        </form>
</div>