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
    
    end===========
</body>
</html>