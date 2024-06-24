<?php
//require __DIR__ . '/vendor/autoload.php';
//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//$dotenv->load();
//
//$config = parse_ini_file(__DIR__ . '/config.ini', true);
require __DIR__ . '/config.php';
?>


<html lang="">
    <head>
        <title>Auth Server</title>
    </head>
    <body>
        <h1>PHP MySQL Connection</h1>


        <?php
      
        // Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else
        echo "Connected successfully";
        
        
        ?>
        mini
    </body>
</html>