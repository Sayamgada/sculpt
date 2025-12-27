<?php
session_start();

$_SESSION['admin_login'] = true;

header('Location: admin_dashboard.php');
?>
