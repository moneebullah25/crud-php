<?php
session_start();

include("db.php");

if (isset($_SESSION["admin_id"])) {
    // Admin is logged in, display admin dashboard
    echo "Welcome, " . $_SESSION["admin_username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        a {
            display: inline-block;
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Admin Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION["admin_username"]; ?></p>

    <!-- Display all users with CRUD operations -->
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        // Replace this with the actual query to fetch user data
        $sql = "SELECT * FROM User";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["Username"] . "</td>";
                echo "<td>" . $row["Role"] . "</td>";
                echo "<td><a href='edit_user.php?UserID=" . $row["ID"] . "'>Edit</a> | <a href='delete_user.php?UserID=" . $row["ID"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }
        ?>
    </table>

    <!-- Add a button to log out -->
    <br><br>
    <a href="logout_admin.php">Log Out</a>
</body>
</html>

<?php
} else {
    header("Location: admin_login.html");
    exit();
}

$conn->close();
?>
