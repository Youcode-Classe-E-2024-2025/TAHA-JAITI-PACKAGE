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

    $query = "INSERT INTO authors (name, email) VALUES ($1, $2) RETURNING id";
    $params = [$authorName,$authorMail];

    $result = pg_query_params($conn, $query, $params);

    session_start();

    if ($result) {
        $authorId = pg_fetch_result($result,0,'id');

        $_SESSION['msg'] = "Author Added Successfully ID:". $authorId;
        $_SESSION["type"] = "success";
        header('Location: ./../../index.php');
        exit;
    } else {
        $_SESSION['msg'] = 'Failed adding author '. pg_last_error($conn);
        $_SESSION['type'] = 'error';
        header('Location: ./../../index.php');
        exit;
    }
}

pg_close($conn);

?>