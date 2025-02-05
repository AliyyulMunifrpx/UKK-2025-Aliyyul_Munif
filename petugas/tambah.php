<?php
include "../db/db.php";

if (isset($_POST['submit'])) {

    $judul = htmlspecialchars($_POST['judul']);
    $pengarang = htmlspecialchars($_POST['pengarang']);
    $penerbit = htmlspecialchars($_POST['penerbit']);
    $tahun = $_POST['tahun'];
    $kategori = $_POST['kategori'];


    $target_dir = "../cover/";
    $target_file = $target_dir . basename($_FILES["cover"]["name"]);


    $cover = basename($_FILES["cover"]["name"]);


    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) {
        $masuk = $kon->prepare("INSERT INTO buku (judul, pengarang, penerbit, tahun, kategori_id, cover) VALUES (?, ?, ?, ?, ?, ?)");
        $masuk->bind_param("ssssds", $judul, $pengarang, $penerbit, $tahun, $kategori, $cover);

        if ($masuk->execute()) {
            header('Location:index.php?status=success');
            exit();
        } else {
            echo "Error: " . $masuk->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <input name="judul" type="text" placeholder="Masukkan judul">
    <input name="pengarang" type="text" placeholder="Masukkan pengarang">
    <input name="penerbit" type="text" placeholder="Masukkan penerbit">
    <input name="tahun" type="date" placeholder="Masukkan tahun terbit">
    <input name="cover" type="file" placeholder="Masukkan link cover gambar">

    <?php
    // Fetch kategori options
    $ambil = "SELECT * FROM kategori";
    $wadah = mysqli_query($kon, $ambil);
    ?>
    <select name="kategori">
        <?php while ($kate = mysqli_fetch_assoc($wadah)) : ?>
            <option value="<?= $kate['id']; ?>"><?= $kate['kategori']; ?></option>
        <?php endwhile; ?>
    </select>

    <button type="submit" name="submit">Tambah Buku</button>
</form>