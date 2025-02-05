<?php
include "../db/db.php";
$id = $_GET['id_buku'];
$ambil = "SELECT buku.judul, buku.pengarang, buku.penerbit, buku.tahun, kategori.id AS kategori_id, kategori.kategori AS kategori, buku.cover
          FROM buku
          JOIN kategori ON buku.kategori_id = kategori.id 
          WHERE buku.id = '$id'";
$wadah = mysqli_query($kon, $ambil);
$buku = mysqli_fetch_assoc($wadah);

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $kategori = $_POST['kategori'];

    $update = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', tahun = '$tahun', kategori_id = '$kategori' WHERE id = '$id'";

    if ($kon->query($update)) {
        header('Location:kelola.php?status=success');
        exit();
    }
}
?>
<form action="" method="POST">
    <input name="judul" type="text" value="<?= $buku['judul']; ?>">
    <input name="pengarang" type="text" value="<?= $buku['pengarang']; ?>">
    <input name="penerbit" type="text" value="<?= $buku['penerbit']; ?>">
    <input name="tahun" type="date" value="<?= $buku['tahun']; ?>">
    <select name="kategori">
        <option value="<?= $buku['kategori_id']; ?>"><?= $buku['kategori']; ?></option>
        <?php
        $kategoriambil = "SELECT * FROM kategori";
        $kategoriwadah = mysqli_query($kon, $kategoriambil);
        while ($kate = mysqli_fetch_assoc($kategoriwadah)) : ?>
            <option value="<?= $kate['id']; ?>" <?= $kate['id'] == $buku['kategori_id'] ? 'selected' : ''; ?>><?= $kate['kategori']; ?></option>
        <?php endwhile; ?>
    </select>
    <button type="submit" name="submit">Edit</button>
</form>