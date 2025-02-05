<?php
include "db/db.php";
include "include/style.php";
session_start();

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($kon, $_POST['username']);
    $password = $_POST['password'];

    $stmt = $kon->prepare("SELECT * FROM user WHERE username = ? AND role = 'peminjam'");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['peminjam_id'] = $user['id'];
        $_SESSION['peminjam_nama'] = $user['nama'];
        $_SESSION['peminjam_role'] = 'peminjam';
        header('Location: index.php?status=success');
        exit();
    } else {
        header('Location: login.php?status=failed');
        exit();
    }
}
?>
<div class="bg-white text-white px-10 py-2 rounded-xl mx-auto my-4 border border-blue max-h-400 flex flex-col" style="width: 300px;">
    <h1 class="font-bold text-blue-700 my-4 mx-auto text-lg">Login Dulu Bos</h1>
    <form action="" method="POST">
        <label for="username" class="block text-black text-xs">Username</label>
        <input name="username" type="text" placeholder="masukin username" class="w-full mt-2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-black" required>
        <label for="password" class="block text-black mt-5 text-xs">Password</label>
        <input name="password" type="password" placeholder="masukin password" class="w-full mt-2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-black" required>
        <button type="submit" name="submit" class="w-full my-4 bg-blue-500 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">Masuk</button>
    </form>
    <div class="block text-black text-xs mx-auto">
        <p>Belum Punya Akun?
            <a href="register.php" class="text-blue-500">Daftar dulu lah</a>
    </div>
</div>