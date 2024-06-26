﻿<?php
require __DIR__ . '/../config/conn.php';
$conn = CONN;
?>


<html lang="">
<head>
    <title>Register</title>
</head>
<body>
<h1>Register Page</h1>

<form method="post" action="">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    
    <label for="confirm_password">Confirm Password:</label><br>
    <input type="password" id="confirm_password" name="confirm_password" required><br>
    
    <button type="submit" name="register">Register</button>
    <button name="back" formnovalidate>Back</button>
</form>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']))
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if ($password != $confirm_password)
    {
        echo "Passwords do not match";
    }
    else
    {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Prepare an SQL statement
        $stmt = $conn->prepare("INSERT INTO `pocketportal-db`.user (user, password) VALUES (?, ?)");
        // Bind the parameters
        $stmt->bind_param("ss", $username, $hashed_password);
        // Execute the statement
        if ($stmt->execute()) {
            echo "Registration successful";
        } 
        else
        {
            echo "Error: " . $stmt->error;
        }
        // Close the statement
        $stmt->close();
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['back']))
{
    header("Location: /login");
    exit;
}
?>