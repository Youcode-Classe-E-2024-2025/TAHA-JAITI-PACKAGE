<?php 
include '../../includes/connect.php';

if ($conn){
    echo 'connected';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['versionSubmit'])) {
    $versionNum = trim($_POST['versionNum']);
    $releaseDate = trim($_POST['releaseDate']);
    $versionPackage = trim($_POST['versionPackage']);

    if (empty($versionNum) || empty($versionPackage) || empty($releaseDate)) {
        die('Empty inputs');
    }

    $query = "INSERT INTO versions (package_id, version_number, release_date) 
    VALUES ($1, $2, $3)";
    $params = [$versionPackage,$versionNum,$releaseDate];

    $result = pg_query_params($conn, $query, $params);

    session_start();

    if ($result) {
        $_SESSION['msg'] = "Version added to package succesfully";
        $_SESSION["type"] = "success";
        header('Location: ./../../index.php');
        exit;
    } else {
        $_SESSION['msg'] = 'Failed adding version '. pg_last_error($conn);
        $_SESSION['type'] = 'error';
        header('Location: ./../../index.php');
        exit;
    }
}

pg_close($conn);

?>