<?php
session_start();
include "db/db.php";
include "include/header.php";


$id = $_GET['id_pjm'];
$peminjam = $_SESSION['peminjam_id'];
$tanggal = date("Y-m-d");

$update = "UPDATE peminjaman SET tanggal_kembali='$tanggal', status='dikembalikan' WHERE id='$id' AND id_user='$peminjam'";

if ($kon->query($update)) {
    echo "<script>alert('Pengembalian Berhasil');</script>";
    header('Location: index.php?status=success');
}
