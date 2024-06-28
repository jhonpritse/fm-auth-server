<?php
require __DIR__ . '/../config/conn.php';
$conn = CONN;
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

    $query = "SELECT * FROM `pocketportal-db`.user WHERE user='$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            echo "Login successful";
            header("Location: /dash");
            exit;
        } else {
            echo "Invalid credentials";
        }
    } else {
        echo "Invalid username";
    }
}
?>
</body>
</html>