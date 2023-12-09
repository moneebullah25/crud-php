<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: user_dashboard.php");
    exit();
}

if (isset($_SESSION["admin_id"])) {
    header("Location: admin_dashboard.php");
    exit();
}

header("Location: login.html");
exit();
?>
