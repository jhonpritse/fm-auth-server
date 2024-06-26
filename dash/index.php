﻿<!--//verify login-->
<?php 
session_start();
require __DIR__ . '/../config/conn.php';
$conn = CONN;

$username = $_SESSION['user'];
$password = $_SESSION['password'];
$query_login = "SELECT * FROM `pocketportal-db`.user WHERE user='$username'";
$result_login = mysqli_query($conn, $query_login);
if (mysqli_num_rows($result_login) > 0) {
    $user = mysqli_fetch_assoc($result_login);
    if (!password_verify($password, $user['password'])) {
        echo "Invalid credentials";
        header("Location: /login");
    }
} else {
    echo "Invalid username";
    header("Location: /login");
}
?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Welcome to the dashboard, <?= $_SESSION['user'] ?></p>

    <form method="post" action="">
        <button type="submit" name="logout">Logout</button>
        <button type="submit" name="add">add</button>
    </form>
    
    end===========
</body>
</html>

<!--show data in table-->
<?php
// Execute a SQL query to fetch the data
$query = "SELECT item_id, item_name, code, stream_url, is_verified, used_amount, c_name,note FROM `pocketportal-db`.codes";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result)
{
    // Start the HTML table
    echo "<!--suppress HtmlDeprecatedAttribute -->
<table border='2'>";
    echo "<tr><th>Item ID</th><th>Item Name</th><th>Code</th><th>Stream URL</th><th>Is Verified</th><th>Used Amount</th><th>Customer Name</th><th>Note</th></tr>";

    // Fetch each row of data
    while ($row = mysqli_fetch_assoc($result)) {
        // Create a new row for each record
        echo "<tr>";
        // Create a new cell for each field in the record
        foreach ($row as $field) {
            echo "<td>" . htmlspecialchars($field) . "</td>";
        }
        echo "</tr>";
    }
    // End the HTML table
    echo "</table>";
} 
else 
{
    echo "Error: " . mysqli_error($conn);
}
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    // Your PHP code here
    header("Location: /dash/add.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    session_destroy();
    header("Location: /dash");
}
?>