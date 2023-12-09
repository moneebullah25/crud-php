<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data and delete user from the database
    $userID = $_POST["userID"];
    
    $sqlUserInformation = "DELETE FROM UserInformation WHERE UserID = $userID";
    
    if ($conn->query($sqlUserInformation) === TRUE) {
        // UserInformation deleted successfully
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

$conn->close();
?>
