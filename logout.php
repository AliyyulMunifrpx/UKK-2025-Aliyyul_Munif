<?php
include "db/db.php";
session_start();
unset($_SESSION['peminjam_id']);
unset($_SESSION['peminjam_nama']);
unset($_SESSION['peminjam_role']);
header('Location:index.php?status=success');
