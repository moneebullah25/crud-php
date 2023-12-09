<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #5bc0de;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #46b8da;
        }
    </style>
</head>
<body>
    <h2>Edit User</h2>
    <?php
    // Retrieve user details from the database and pre-fill the form
    include("db.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["UserID"])) {
        $userID = $_GET["UserID"];
        $sql = "SELECT * FROM UserInformation WHERE UserID = $userID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
    <form action="process_edit_user.php" method="POST">
        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
        
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $row["Name"]; ?>" required><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" value="<?php echo $row["Dob"]; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row["Email"]; ?>"><br>

        <label for="telephone">Telephone:</label>
        <input type="tel" name="telephone" value="<?php echo $row["Telephone"]; ?>"><br>

        <label for="nextOfKin">Next of Kin:</label>
        <input type="text" name="nextOfKin" value="<?php echo $row["NextOfKin"]; ?>"><br>

        <label for="age">Age:</label>
        <input type="number" name="age" value="<?php echo $row["Age"]; ?>"><br>

        <label for="illness">Illness:</label>
        <input type="text" name="illness" value="<?php echo $row["Illness"]; ?>"><br>

        <label for="lastResidence">Last Residence Address:</label>
        <input type="text" name="lastResidence" value="<?php echo $row["LastResidenceAddress"]; ?>"><br>

        <label for="recommendedSource">Recommended Source:</label>
        <input type="text" name="recommendedSource" value="<?php echo $row["RecommendedSource"]; ?>"><br>

        <label for="recommendedSourceAddress">Recommended Source Address:</label>
        <input type="text" name="recommendedSourceAddress" value="<?php echo $row["RecommendedSourceAddress"]; ?>"><br>

        <button type="submit">Update</button>
    </form>
    <?php
        } else {
            echo "User not found. Redirecting to add user page...".$userID."";
            $_SESSION["user_id_add"] = $userID;
            setcookie("user_id_add", $userID, time() + (86400 * 30), "/"); // Cookie expires in 30 days

            echo '<script>window.location.href = "add_user.php";</script>';
        }
    } else {
        echo "Invalid request.";
    }
    ?>
</body>
</html>
