<?php
require __DIR__ . '/../conn.php';
$conn = CONN; 
?>

<html lang="">
<head>
    <title>Dashboard</title>
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