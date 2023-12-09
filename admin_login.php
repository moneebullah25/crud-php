<?php
include("db.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM User WHERE Username = '$username' AND Role = 'admin'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["Password"])) {
            $_SESSION["admin_id"] = $row["ID"];
            $_SESSION["admin_username"] = $row["Username"];
            header("Location: admin_dashboard.php");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Admin not found";
    }
}

$conn->close();
?>
