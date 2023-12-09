<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
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
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Add New User</h2>
    <form action="process_add_user.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="telephone">Telephone:</label>
        <input type="tel" id="telephone" name="telephone">

        <label for="nextOfKin">Next of Kin:</label>
        <input type="text" id="nextOfKin" name="nextOfKin">

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="illness">Illness:</label>
        <input type="text" id="illness" name="illness">

        <label for="lastResidence">Last Residence Address:</label>
        <input type="text" id="lastResidence" name="lastResidence">

        <label for="recommendedSource">Recommended Source:</label>
        <input type="text" id="recommendedSource" name="recommendedSource" required>

        <label for="recommendedSourceAddress">Recommended Source Address:</label>
        <input type="text" id="recommendedSourceAddress" name="recommendedSourceAddress" required>

        <label for="photo">Upload Passport Photograph:</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
