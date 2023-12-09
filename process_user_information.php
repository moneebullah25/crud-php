<?php
include("db.php");

if (!isset($_COOKIE["user_id"])) {
    echo "User ID cookie not set.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process UserInformation data
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

    $user_id = $_COOKIE["user_id"];

    $sqlUserInformation = "INSERT INTO UserInformation (UserID, Name, Dob, Email, Telephone, NextOfKin, Age, Illness, LastResidenceAddress, RecommendedSource, RecommendedSourceAddress) VALUES ($user_id, '$name', '$dob', '$email', '$telephone', '$nextOfKin', $age, '$illness', '$lastResidence', '$recommendedSource', '$recommendedSourceAddress')";
    
    if ($conn->query($sqlUserInformation) === TRUE) {
        $lastInsertedUserId = $conn->insert_id;
        $photoName = basename($_FILES["photo"]["name"]);

        // Check if the user ID exists in UserInformation before inserting into PassportPhotograph
        if ($lastInsertedUserId > 0) {
            // User exists, proceed with inserting into PassportPhotograph
            $sqlPassportPhotograph = "INSERT INTO PassportPhotograph (UserID, Image) VALUES ($user_id, '$photoName')";

            if ($conn->query($sqlPassportPhotograph) === TRUE) {
                echo "User information stored successfully.";
            } else {
                echo "Error storing PassportPhotograph data: " . $conn->error;
            }
        } else {
            echo "Invalid User ID. Please ensure UserInformation is inserted first.";
        }
    } else {
        echo "Error storing UserInformation data: " . $conn->error;
    }
}

$conn->close();
?>
