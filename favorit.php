<?php
include "db/db.php";
session_start();
$id_user = $_SESSION['peminjam_id'];
$id_buku = $_GET['id_buku'];
$masuk = "INSERT INTO favorit(id_buku, id_user) VALUES ('$id_buku', '$id_user')";

if ($kon->query($masuk)) {
    header('Location:favorittampil.php?status=success');
    exit();
} else {
    echo "Error: " . $kon->error;
}
