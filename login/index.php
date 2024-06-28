<?php
require __DIR__ . '/../config.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>


<html lang="">
<head>
    <title>Welcome</title>
</head>
<body>
<h1>Welcome, Log in page</h1>


<form method="post" action="">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>
    <input type="submit" value="Login">
</form>
<form action="register.php" method="get">
    <button type="submit">Register</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM `pocketportal-db`.user WHERE user='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Login successful";
    } else {
        echo "Invalid credentials";
    }
}
?>
</body>
</html>