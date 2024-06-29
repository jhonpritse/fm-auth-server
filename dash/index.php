<?php /** @noinspection PhpUnreachableStatementInspection */
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
exit;
?>



<html lang="">
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Dashboard</h1>
<p>Welcome to the dashboard, <?= $_SESSION['user'] ?></p>

<form action="/login" method="post">
    <button type="submit">Logout</button>

    <?php
    // Execute a SQL query to fetch the data
    $query = "SELECT * FROM `pocketportal-db`.codes";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Start the HTML table
        echo "<table>";
        echo "<tr><th>item id</th><th>code</th><th>stream url</th><th>item name</th><th>customer name</th><th>verification status</th><th>used amount</th><th>note</th><th>note 1</th><th>note 2</th><th>note 3</th><th>note 4</th><th>note 5</th></tr>";

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
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    ?>
    
</body>
</html>