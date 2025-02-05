<?php
include "../db/db.php";
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($kon, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];

    $simpan = "INSERT INTO user(username,password,email,nama,alamat,role) VALUES ('$username', '$password', '$email', '$nama','$alamat','$role')";
    if ($kon->query($simpan)) {
        header('Location:login.php?status=success');
    }
}
?>
<form action="" method="POST">
    <input name="username" type="text" placeholder="masukin username">
    <input name="password" type="password" placeholder="masukin password">
    <input name="email" type="text" placeholder="masukin email">
    <input name="nama" type="text" placeholder="masukin nama lengkap">
    <input name="alamat" type="text" placeholder="masukin alamat">
    <select name="role">
        <option value="petugas">Petugas
        </option>
        <option value="admin">Admin

        </option>
    </select>
    <button type="submit" name="submit">Daftar</button>
</form>