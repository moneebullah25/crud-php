<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"];

    $sql = "INSERT INTO User (Username, Password, Role) VALUES ('$username', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
