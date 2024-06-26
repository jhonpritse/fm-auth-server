<?php
require __DIR__ . '/config.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>


<html lang="">
    <head>
        <title>Auth Server</title>
    </head>
    <body>
        <h1>PHP MySQL Connection</h1>
        mini
    </body>
</html>