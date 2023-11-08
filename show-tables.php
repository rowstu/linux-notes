<?php
// php -f show-tables.php

// use this to do a quick show tables on a remote MySQL server

$db_config = [
    'host' => '<server name>',
    'user' => '<mysql_user>',
    'password' => '<mysql_password>',
    'database' => '<database_name>',
];

try {

    $conn = new mysqli($db_config['host'], $db_config['user'], $db_config['password'], $db_config['database']);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connected to the MySQL server\n";

    $query = "SHOW TABLES";
    $result = $conn->query($query);

    if ($result) {
        echo "Tables in the database:\n";
        while ($row = $result->fetch_assoc()) {
            echo $row['Tables_in_' . $db_config['database']] . "\n";
        }
    } else {
        echo "Error: " . $conn->error . "\n";
    }

    $conn->close();
    echo "MySQL connection closed\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
