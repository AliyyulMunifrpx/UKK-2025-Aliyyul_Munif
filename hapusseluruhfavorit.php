<?php
include "db/db.php";
session_start();
$peminjam = $_SESSION['peminjam_id'];
$hapus = "DELETE FROM favorit WHERE id_user='$peminjam'";
if ($kon->query($hapus)) {
    header('Location:favorittampil.php?status=success');
}
