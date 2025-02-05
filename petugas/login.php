<?php
include "../db/db.php";
session_start();

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($kon, $_POST['username']);
    $password = $_POST['password'];

    $stmt = $kon->prepare("SELECT * FROM user WHERE username = ? AND role = 'petugas'");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['petugas_id'] = $user['id'];
        $_SESSION['petugas_nama'] = $user['nama'];
        $_SESSION['petugas_role'] = 'petugas';
        header('Location: index.php?status=success');
        exit();
    } else {
        header('Location: login.php?status=failed');
        exit();
    }
}
?>

<form action="" method="POST">
    <input name="username" type="text" placeholder="Masukkan username" required>
    <input name="password" type="password" placeholder="Masukkan password" required>
    <button type="submit" name="submit">Masuk</button>
</form>

<?php if (isset($_GET['status']) && $_GET['status'] == 'failed') : ?>
    <p style="color: red;">Login gagal! Username atau password salah.</p>
<?php endif; ?>