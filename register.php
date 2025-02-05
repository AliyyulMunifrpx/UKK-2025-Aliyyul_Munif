<?php
include "db/db.php";
include "include/style.php";
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($kon, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $role = 'peminjam';

    $simpan = "INSERT INTO user(username,password,email,nama,alamat,role) VALUES ('$username', '$password', '$email', '$nama','$alamat','$role')";
    if ($kon->query($simpan)) {
        header('Location:login.php?status=success');
    }
}
?>
<div class="bg-white text-white px-10 py-2 rounded-xl mx-auto my-4 border border-blue max-h-400 flex flex-col" style="width: 300px;">
    <form action="" method="POST">
        <input name="username" type="text" placeholder="masukin username">
        <input name="password" type="password" placeholder="masukin password">
        <input name="email" type="text" placeholder="masukin email">
        <input name="nama" type="text" placeholder="masukin nama lengkap">
        <input name="alamat" type="text" placeholder="masukin alamat">
        <button type="submit" name="submit">Daftar</button>
    </form>
    <div class="block text-black text-xs mx-auto">
        <p>Belum Punya Akun?
            <a href="login.php" class="text-blue-500">Daftar dulu lah</a>
    </div>
</div>