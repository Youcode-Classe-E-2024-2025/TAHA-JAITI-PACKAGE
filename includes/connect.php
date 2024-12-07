<?php
$host = 'localhost';
$db = 'package_manager';
$user = 'postgres';
$pass = 'root';

$connect = "host=$host dbname=$db user=$user password=$pass";

// Connect to the PostgreSQL database
$conn = pg_connect($connect);

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>
