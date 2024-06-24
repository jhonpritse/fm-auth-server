<?php
//require __DIR__ . '/vendor/autoload.php';
//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//$dotenv->load();
$config = parse_ini_file(__DIR__ . '/config.ini',true);

//?>

<html lang="">
    <head>
        <title>Auth 2 Server</title>
    </head>
    <body>
        <h1>PHP MySQL Connection</h1>


        <?php
        $db = $config['database']['DB_NAME'];
        echo "Database name: $db  \r\n"
        ?>
        mini
    </body>
</html>