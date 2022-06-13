<?php

const DB_NAMESERVER = "localhost: 3306";
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "boolean_movies");

// SETUP connessione
$conn = new mysqli( DB_NAMESERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );

// Connessione
if ($conn && $conn -> connect_error) {
    echo "Connection failed: " . $conn -> connect_error;
    exit();
}


?>