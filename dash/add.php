<?php
session_start();
require __DIR__ . '/../config/conn.php';
$conn = CONN;
?>

<html lang="">
<head>
    <title>Add Item</title>
</head>
<body>
<h1>Add Item</h1>
<form method="post" action="">
    <label for="item_id">Item ID:</label><br>
    <input type="text" id="item_id" name="item_id" required><br>

    <label for="code">Code:</label><br>
    <input type="text" id="code" name="code" required><br>

    <label for="stream_url">Stream URL:</label><br>
    <input type="text" id="stream_url" name="stream_url" required><br>

    <label for="item_name">Item Name:</label><br>
    <input type="text" id="item_name" name="item_name" required><br>

    <br>
    Optional:
    <br>

    <label for="is_verified">Is Verified:</label><br>
    <input type="number" id="is_verified" name="is_verified" step="1"><br>

    <label for="used_amount">Used Amount:</label><br>
    <input type="number" id="used_amount" name="used_amount" step="1"><br>

    <label for="c_name">Customer Name:</label><br>
    <input type="text" id="c_name" name="c_name"><br>

    <label for="note">Note:</label><br>
    <input type="text" id="note" name="note"><br>

    <input type="submit" value="Add Item">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    $stream_url = mysqli_real_escape_string($conn, $_POST['stream_url']);
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $is_verified = mysqli_real_escape_string($conn, $_POST['is_verified']);
    $used_amount = mysqli_real_escape_string($conn, $_POST['used_amount']);
    $c_name = mysqli_real_escape_string($conn, $_POST['c_name']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);

    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO `pocketportal-db`.codes (item_id, item_name, code, stream_url, is_verified, used_amount, c_name, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("ssssssss", $item_id, $item_name, $code, $stream_url, $is_verified, $used_amount, $c_name, $note);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Item added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

?>
end++++
</body>
</html>