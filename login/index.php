<?php
session_start();
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
    
    <button type="submit" name="login">Login</button>
    <button type="submit" name="register">Register</button>
</form>


</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])) 
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM `pocketportal-db`.user WHERE user='$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) 
        {
            $_SESSION['user'] = $user['user'];
            $_SESSION['password'] = $password;
            header("Location: /dash");
            exit;
        }
        else 
        {
            echo "Invalid credentials";
        }
    } 
    else
    {
        echo "Invalid username";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) 
{
    header("Location: /login/register.php");
    exit;
}
?>