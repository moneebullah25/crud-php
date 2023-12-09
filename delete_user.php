<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
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
            margin-bottom: 20px;
        }

        form {
            display: inline-block;
        }

        button, a {
            display: inline-block;
            background-color: #d9534f;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        a {
            background-color: #5bc0de;
        }

        button:hover, a:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <h2>Delete User</h2>
    <?php
    // Retrieve user details from the database for confirmation
    include("db.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["UserID"])) {
        $userID = $_GET["UserID"];
        $sql = "SELECT * FROM UserInformation WHERE UserID = $userID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
    <p>Are you sure you want to delete the user "<?php echo $row["Name"]; ?>"?</p>
    <form action="process_delete_user.php" method="POST">
        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
        <button type="submit">Yes, Delete</button>
        <a href="admin_dashboard.html">Cancel</a>
    </form>
    <?php
        } else {
            echo "UserInformation not found.";
        }
    } else {
        echo "Invalid request.";
    }
    ?>
</body>
</html>
