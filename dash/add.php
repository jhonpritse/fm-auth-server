﻿<?php
require __DIR__ . '/../config/conn.php';
$conn = CONN;

require  __DIR__ . '/../config/generate_code.php';
?>

<html lang="">
<head>
    <script src="/config/generate_QR.js"></script>
    <title>Add Item</title>
</head>
<body>
    <h1>Add Item</h1>
    <form method="post" action="" >
        <label for="item_id">Item ID:</label><br>
        <input type="text" id="item_id" name="item_id" required><br>
    
        <label for="code">Code:</label><br>
        <input type="text" id="code" name="code" value="<?php echo generateRandomCode()?>" required><br>
    
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
    
        <button type="submit" id="add" name="add">Add</button>
        <button name="back" formnovalidate>Back</button>
    </form>
----QR code generator-------------------
    <div id="qrcode">d</div>
______________________________________ 
    end++++++++++++++++++++++++++++++++ <br>
</body>
</html>

<?php
if ( $_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['add']) && isset($_POST['item_id']) && isset($_POST['code']) && isset($_POST['stream_url']) && isset($_POST['item_name'])) 
{
    
    
    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    $stream_url = mysqli_real_escape_string($conn, $_POST['stream_url']);
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    if (empty($_POST['is_verified'])) {
        $is_verified = 0;
    }else{
        $is_verified = mysqli_real_escape_string($conn, $_POST['is_verified']);
    }
    if (empty($_POST['used_amount'])) {
        $used_amount = 0;
    }else{
    $used_amount = mysqli_real_escape_string($conn, $_POST['used_amount']);
    }
    if (empty($_POST['c_name'])) {
        $c_name = null;
    }else {
        $c_name = mysqli_real_escape_string($conn, $_POST['c_name']);
    }
    if (empty($_POST['note'])) {
        $note = null;
    }else{
        $note = mysqli_real_escape_string($conn, $_POST['note']);
    }
    
    $used_amount = (int)$used_amount;
    $is_verified = (int)$is_verified;

    // Check if item_id or code already exists
    $check_query = "SELECT * FROM `pocketportal-db`.codes WHERE item_id = '$item_id' OR code = '$code'";
    $check_result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        echo "Item ID or Code already exists";
        exit;
    }
    else
    {
        // Prepare an SQL statement
        $stmt = $conn->prepare("INSERT INTO `pocketportal-db`.codes 
            (item_id, item_name, code, stream_url, is_verified, used_amount, c_name, note)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("ssssssss",
            $item_id, $item_name, $code, $stream_url, $is_verified, $used_amount, $c_name, $note);
        // Execute the statement
        if ($stmt->execute()) {
            echo "Item added successfully<br>";
            $qr_text = 'auth.thepocketportal.com/v/'.$code;
            echo "
                <script src='/config/generate_QR.js'>
                    // Call the generateQRCode function when the form is submitted
                    document.getElementById('add').addEventListener('click', function() {
                        generateQRCode('$qr_text');
                    });
                </script>
            ";
            echo "<button id='download'>Download QR Code</button> <br>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();   
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['back'])) {
    header("Location: /dash");
    exit;
}
?>



