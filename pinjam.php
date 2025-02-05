<?php
include "db/db.php";
session_start();
$id = $_GET['id_buku'];
$peminjam_id = $_SESSION['peminjam_id'];
$tanggal = date("Y-m-d");


$pinjam = "INSERT INTO peminjaman(id_user,id_buku,tanggal_pinjam,status) VALUES ('$peminjam_id', '$id', '$tanggal', 'dipinjam')";
if ($kon->query($pinjam)) {
    header('Location:index.php?status=success');
}
