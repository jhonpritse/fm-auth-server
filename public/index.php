<html lang="">
    <head>
        <title>Auth Server</title>
    </head>
    <body>
        <h1>PHP MySQL Connection</h1>
        
        
        <?php

        $host = getenv('DB_HOST');
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASS');
        $db = getenv('DB_NAME');
        
        echo ("$host");
        echo ("$user");
        echo ("$pass");
        echo ("$db");
        echo ("Hello World");
        ?>
    mini
    </body>
</html>