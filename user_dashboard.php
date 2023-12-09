<?php
session_start();

include("db.php");

if (isset($_SESSION["user_id"])) {
    $userId = $_SESSION["user_id"];

    // Check if UserInformation is filled for the user
    $sql = "SELECT * FROM UserInformation WHERE UserID = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // UserInformation is filled, display user dashboard
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
        }

        h3 {
            color: #4caf50;
        }

        a {
            display: inline-block;
            background-color: #d9534f;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }

        a:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <h2>User Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION["username"]; ?></p>
    
    <!-- Display UserInformation -->
    <h3>User Information</h3>
    <p>Name: <?php echo $row["Name"]; ?></p>
    <p>Date of Birth: <?php echo $row["Dob"]; ?></p>
    <p>Email: <?php echo $row["Email"]; ?></p>
    <p>Telephone: <?php echo $row["Telephone"]; ?></p>
    <p>Next of Kin: <?php echo $row["NextOfKin"]; ?></p>
    <p>Age: <?php echo $row["Age"]; ?></p>
    <p>Illness: <?php echo $row["Illness"]; ?></p>
    <p>Last Residence Address: <?php echo $row["LastResidenceAddress"]; ?></p>
    <p>Recommended Source: <?php echo $row["RecommendedSource"]; ?></p>
    <p>Recommended Source Address: <?php echo $row["RecommendedSourceAddress"]; ?></p>
        
    <!-- Additional code for updating user details if required -->
    
    <!-- Add a button to log out -->
    <br><br>
    <a href="logout_admin.php">Log Out</a>
</body>
</html>
<?php
    } else {
        // UserInformation is not filled, redirect to user information form
        $_SESSION["user_id"] = $userId;
        header("Location: user_information_form.html");
        exit();
    }
} else {
    // User is not logged in, redirect to login page
    header("Location: login.html");
    exit();
}

$conn->close();
?>
