<?php
include("db.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM User WHERE Username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["Password"])) {
            $_SESSION["user_id"] = $row["ID"];
            $_SESSION["username"] = $row["Username"];
            $_SESSION["role"] = $row["Role"];
            setcookie("user_id", $row["ID"], time() + (86400 * 30), "/"); // Cookie expires in 30 days
            if ($_SESSION["role"] == "user") {
                header("Location: user_dashboard.php");
            } else {
                $_SESSION["admin_id"] = $row["ID"];
                $_SESSION["admin_username"] = $row["Username"];
                header("Location: admin_dashboard.php");
            }
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found. Redirecting to registration...";
        echo '<script>window.location.href = "register.html";</script>';
    }
}

$conn->close();
?>
