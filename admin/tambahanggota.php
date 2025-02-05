<?php
include "../db/db.php";

session_start();
include "../include/headeradmin.php";
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($kon, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];

    $simpan = "INSERT INTO user(username,password,email,nama,alamat,role) VALUES ('$username', '$password', '$email', '$nama','$alamat','$role')";
    if ($kon->query($simpan)) {
        header('Location:index.php?status=success');
    }
}
?>


<div class="text-lg font-bold bg-white text-white px-2 py-2 rounded-xl mx-auto my-4 border border-blue" style="width: 500px; height:auto;">
    <h2 class=" text-2xl font-bold mb-6 text-center text-black mt-10">Isi Dulu Min Ademin</h2>
    <form action="" method="POST">
        <div class="mb-4 px-10">
            <label for="username" class="block text-black">Username</label>
            <input name="username" type="text" placeholder="Masukkan username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
        </div>
        <div class="mb-4 px-10">
            <label for="password" class="block text-black">Password</label>
            <input name="password" type="password" placeholder="Masukkan password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
        </div>
        <div class="mb-4 px-10">
            <label for="email" class="block text-black">Email</label>
            <input name="email" type="text" placeholder="Masukkan email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
        </div>
        <div class="mb-4 px-10">
            <label for="nama" class="block text-black">Nama Lengkap</label>
            <input name="nama" type="text" placeholder="Masukkan nama lengkap" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
        </div>
        <div class="mb-4 px-10">
            <label for="alamat" class="block text-black">Alamat</label>
            <input name="alamat" type="text" placeholder="Masukkan alamat" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
        </div>
        <div class="mb-4 px-10">
            <label for="role" class="block text-black">Role</label>
            <select name="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                <option value="petugas" class="text-black">Petugas</option>
                <option value="admin" class="text-black">Admin</option>
            </select>
        </div>
        <div class="px-10 pb-10">
            <button type="submit" name="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-300">Daftar</button>
        </div>
    </form>
</div>