<?php
include "../db/db.php";
session_start();
unset($_SESSION['admin_id']);
unset($_SESSION['admin_nama']);
unset($_SESSION['admin_role']);
header('Location:index.php?status=success');
