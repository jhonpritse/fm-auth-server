<?php
//require __DIR__ . '/vendor/autoload.php';
//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//$dotenv->load();
$config = parse_ini_file(__DIR__ . '/config.ini', true);
require __DIR__ . '/login.php';
?>
<html lang="">
    <head>
        <title>Auth 55 Server</title>
    </head>
    <body>
        <h1>PHP MySQL Connection</h1>


        <?php
        $db = DB_NAME;
        echo "Database name: $db  \r\n";
        echo "++++";
        echo DB_NAME ;
        echo "____";
        echo __DIR__ . "/config.ini";
        ?>
        mini
    </body>
</html>