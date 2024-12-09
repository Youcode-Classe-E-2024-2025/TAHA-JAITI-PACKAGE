<?php 
include '../../includes/connect.php';

if ($conn){
    echo 'connected';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['packageSubmit'])) {
    $packageName = trim($_POST['packageName']);
    $packageDesc = trim($_POST['packageDesc']);
    $packageDate = $_POST['packageDate'];
    $packageAuthor = trim($_POST['packageAuthor']);


    if (empty($packageName) || empty($packageDesc || 
    empty($packageDate)) || empty($packageAuthor)){
        die('Empty inputs');
    }

    $query = "INSERT INTO packages (name, description, creation_date, author_id) 
    VALUES ($1, $2, $3, $4) RETURNING id";
    $params = [$packageName,$packageDesc, $packageDate, $packageAuthor];

    $result = pg_query_params($conn, $query, $params);

    session_start();

    if ($result) {
        $packageId = pg_fetch_result($result,0,"id");

        $_SESSION['msg'] = "Package Added Successfully ID:". $packageId;
        $_SESSION["type"] = "success";
        header('Location: ./../../index.php');
        exit;
    } else {
        $_SESSION['msg'] = 'Failed adding package '. pg_last_error($conn);
        $_SESSION['type'] = 'error';
        header('Location: ./../../index.php');
        exit;
    }
}

pg_close($conn);

?>