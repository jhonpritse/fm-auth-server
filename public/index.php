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
<?php
$result = mysqli_query($conn,
    "SELECT * FROM `pocketportal-db`.user");
$data = $result->fetch_all(MYSQLI_ASSOC);
?>
<?php foreach($data as $row): ?>
    <tr>
        <td><?= htmlspecialchars($row['user']) ?></td>
        <td><?= htmlspecialchars($row['password']) ?></td>
    </tr>
<?php endforeach ?>
        --end--
    </body>
</html>