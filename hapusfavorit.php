<?php
include "db/db.php";
session_start();
$peminjam = $_SESSION['peminjam_id'];
$id_buku = $_GET['id_buku'];
$hapus = "DELETE FROM favorit WHERE id_user='$peminjam' AND id_buku='$id_buku'";
if ($kon->query($hapus)) {
    header('Location:favorittampil.php?status=success');
}
