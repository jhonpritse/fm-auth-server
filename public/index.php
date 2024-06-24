using Dotenv\Dotenv as Dotenv;
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();


<html lang="">
    <head>
        <title>Auth Server</title>
    </head>
    <body>
        <h1>PHP MySQL Connection</h1>


        <?php
        $db = $_ENV['DB_NAME'];
        echo "Database name: $db  \r\n"
        ?>
        mini
    </body>
</html>