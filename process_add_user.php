<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data and insert into database
    $userID = $_COOKIE["user_id_add"];
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

    $sqlUserInformation = "INSERT INTO UserInformation (UserID, Name, Dob, Email, Telephone, NextOfKin, Age, Illness, LastResidenceAddress, RecommendedSource, RecommendedSourceAddress) 
        VALUES ('$userID','$name', '$dob', '$email', '$telephone', '$nextOfKin', $age, '$illness', '$lastResidence', '$recommendedSource', '$recommendedSourceAddress')";
    
    if ($conn->query($sqlUserInformation) === TRUE) {
        // UserInformation added successfully
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error adding user: " . $conn->error;
    }
}

$conn->close();
?>
