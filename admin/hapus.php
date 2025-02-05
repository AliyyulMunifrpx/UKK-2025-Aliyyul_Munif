<?php
include "../db/db.php";

if (!isset($_GET['id_buku']) || empty($_GET['id_buku'])) {
    header('Location: kelola.php?status=error');
    exit();
}

$id = $_GET['id_buku'];


$hapusUlasan = $kon->prepare("DELETE FROM ulasan WHERE id_buku=?");
$hapusUlasan->bind_param("i", $id);
$hapusUlasan->execute();
$hapusUlasan->close();

$hapusPeminjaman = $kon->prepare("DELETE FROM peminjaman WHERE id_buku=?");
$hapusPeminjaman->bind_param("i", $id);
$hapusPeminjaman->execute();
$hapusPeminjaman->close();

$hapusFavorit = $kon->prepare("DELETE FROM favorit WHERE id_buku=?");
$hapusFavorit->bind_param("i", $id);
$hapusFavorit->execute();
$hapusFavorit->close();


$hapusBuku = $kon->prepare("DELETE FROM buku WHERE id=?");
$hapusBuku->bind_param("i", $id);

if ($hapusBuku->execute()) {
    $hapusBuku->close();
    header('Location: kelola.php?status=success');
} else {
    header('Location: kelola.php?status=error');
}

exit();
