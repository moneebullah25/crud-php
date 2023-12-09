<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data and update user in the database
    $userID = $_POST["userID"];
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $nextOfKin = $_POST["nextOfKin"];
    $age = $_POST["age"];
    $illness = $_POST["illness"];
    $lastResidence = $_POST["lastResidence"];
    $recommendedSource = $_POST["recommendedSource"];
    $recommendedSourceAddress = $_POST["recommendedSourceAddress"];

    $sqlUserInformation = "UPDATE UserInformation SET 
        Name='$name', 
        Dob='$dob', 
        Email='$email', 
        Telephone='$telephone', 
        NextOfKin='$nextOfKin', 
        Age=$age, 
        Illness='$illness', 
        LastResidenceAddress='$lastResidence', 
        RecommendedSource='$recommendedSource', 
        RecommendedSourceAddress='$recommendedSourceAddress' 
        WHERE UserID = $userID";
    
    if ($conn->query($sqlUserInformation) === TRUE) {
        // UserInformation updated successfully
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

$conn->close();
?>
