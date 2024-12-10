<?php
$host = 'localhost';
$db = 'package_manager';
$admindb = 'postgres';
$user = 'postgres';
$pass = 'root';

$connect = "host=$host dbname=$admindb user=$user password=$pass";
$connectReal = "host=$host dbname=$db user=$user password=$pass";

// Connect to the PostgreSQL database
$conn = pg_connect($connect);

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

$query = "SELECT 1 FROM pg_database WHERE datname = $1";
$result = pg_query_params($conn, $query, [$db]);

if (!$result) {
    die ("Error in query". pg_last_error());
}

if (pg_num_rows($result) === 0) {
    include './views/createDb.html';

    if (isset($_POST['createDb'])){
        $createQuery = "CREATE DATABASE $db";
        $createResult = pg_query($conn, $createQuery);

        if (!$createResult){
            die("error creating database". pg_last_error());
        }

        $conn = pg_connect($connectReal);

        if (!$conn) {
            die("Connection failed: " . pg_last_error());
        }

        $sqlFile = './sql/database.sql';
        $sqlRead = file_get_contents($sqlFile);

        if (!$sqlRead) {
            die("error reading file");
        }

        $sqlResult = pg_query($conn, $sqlRead);

        if (!$sqlResult){
            die("error executing file". pg_last_error());
        }

        header("Location: ./index.php");
    }

 } else {
    $conn = pg_connect($connectReal);
 }

?>
