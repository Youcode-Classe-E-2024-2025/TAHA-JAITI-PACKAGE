<?php 
include '../../includes/connect.php';

if ($conn){
    echo 'connected';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['authorSubmit'])) {
    $authorName = trim($_POST['authorName']);
    $authorMail = trim($_POST['authorMail']);

    if (!filter_var($authorMail, FILTER_VALIDATE_EMAIL)){
        die('Invalid email adress');
    }

    if (empty($authorName) || empty($authorMail)){
        die('Empty inputs');
    }

    $query = "INSERT INTO authors (name, email) VALUES ($1, $2)";
    $params = [$authorName,$authorMail];

    $result = pg_query_params($conn, $query, $params);

    if ($result) {
        echo "Author Added";
        header('Location: ./../../index.php');
        exit;
    } else {
        echo "failed to add" . pg_last_error($conn);
        header('Location: ./../../index.php');
        exit;
    }
}

pg_close($conn);

?>