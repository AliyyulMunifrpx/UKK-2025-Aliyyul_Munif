<?php
include "../db/db.php";
$id = $_GET['id_buku'];
$ambil = "SELECT * FROM buku WHERE id='$id'";
$wadah = mysqli_query($kon, $ambil);
$buku = mysqli_fetch_assoc($wadah);
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];

    $update = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun='$tahun' WHERE id='$id'";

    if ($kon->query($update)) {
        header('Location:index.php?status=success');
        exit();
    }
}
?>
<form action="" method="POST">
    <input name="judul" type="text" value="<?= $buku['judul']; ?>">
    <input name="pengarang" type="text" value="<?= $buku['pengarang']; ?>">
    <input name="penerbit" type="text" value="<?= $buku['penerbit']; ?>">
    <input name="tahun" type="date" value="<?= $buku['tahun']; ?>">
    <button type="submit" name="submit">Edit</button>
</form>