<?php
$servername = "db";
$username = "php_docker";
$password = "password";
$dbname = "php_docker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
