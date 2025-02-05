<?php
session_start();
?>
<!DOCTYPE html>
<html lang="e   
<head>
    <meta charset=" UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<title>Peminjam</title>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col ">
    <div class="bg-blue-700 px-4 py-4">

        <div class="text-white font-bold text-center text-xl">
            <a href="../ukk/index.php" class="px-20 hover:text-green-200 hover:scale-110 transition">BUKU</a>
            <a href="../ukk/akun.php" class="px-20 hover:text-green-200 hover:scale-110 transition">AKUN</a>
            <a href="../ukk/bukusaya.php" class="px-20 hover:text-green-200 hover:scale-110 transition">DIPINJAM</a>
            <a href="../ukk/riwayat.php" class="px-20 hover:text-green-200 hover:scale-110 transition">RIWAYAT</a>
            <a href="../ukk/favorittampil.php" class="px-20 hover:text-green-200 hover:scale-110 transition">FAVORIT</a>
        </div>
    </div>
    <h1 class="text-blue-700 font-bold text-center text-xl mt-10">TUMBEN MAU BACA BRO <?= $_SESSION['peminjam_nama']; ?></h1>

    </>
    <div class="py-10">

    </div>

</html>