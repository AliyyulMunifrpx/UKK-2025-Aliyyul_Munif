<?php
include "db/db.php";
session_start();
unset($_SESSION['petugas_id']);
unset($_SESSION['petugas_nama']);
unset($_SESSION['petugas_role']);
header('Location:index.php?status=success');
