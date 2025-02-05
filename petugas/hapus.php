<?php
include "../db/db.php";
$id = $_GET['id_buku'];
$hapus = "DELETE FROM buku WHERE id='$id'";
if ($kon->query($hapus)) {
    header('Location:index.php?status=success');
    exit();
}
