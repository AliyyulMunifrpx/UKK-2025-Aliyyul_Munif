<?php
include "db/db.php";
include "include/header.php";

$iduser = $_SESSION['peminjam_id'];
$ambil = "SELECT * FROM user WHERE id='$iduser'";
$wadah = mysqli_query($kon, $ambil);
$akun = mysqli_fetch_assoc($wadah);
?>

<body>
    <div class="bg-blue-200 p-6 rounded-lg shadow-lg aspect-w-3 aspect-h-4 mx-20">
        <h1 class="text-lg font-bold">Username: <?= $akun['username']; ?></h1>
        <h1 class="text-lg font-bold">Email: <?= $akun['email']; ?></h1>
        <h1 class="text-lg font-bold">Nama Lengkap: <?= $akun['nama']; ?></h1>
        <h1 class="text-lg font-bold">Alamat: <?= $akun['alamat']; ?></h1>

    </div>
    <div class="ml-40 mt-4">
        <a href="logout.php?id_user=<?= $akun['id']; ?>" class="text-lg font-bold bg-red-700 text-white px-2 py-2 rounded-xl">Logout Ah Bosen e Bos</a>
    </div>
</body>

</html>