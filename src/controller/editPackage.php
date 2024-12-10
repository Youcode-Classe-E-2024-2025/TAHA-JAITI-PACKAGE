<?php
include "../../includes/connect.php";

if (isset($_POST["editPackageSubmit"])) {
    $editedPackageId = $_POST["editedPackageId"];
    $editPackageName = $_POST["editPackageName"];
    $editPackageDesc = $_POST["editPackageDesc"];
    $editPackageDate = $_POST["editPackageDate"];
    $editPackageAuthor = $_POST["editPackageAuthor"];

    if (
        empty($editedPackageId) || empty($editPackageName) || empty($editPackageDate)
        || empty($editPackageAuthor) || empty($editPackageDesc)
    ) {
        die("Empty inputs");
    }

    pg_query($conn, "BEGIN");

    $query = "UPDATE packages 
    SET name = $1, description = $2, creation_date = $3, author_id = $4
    WHERE id = $5;
    ";

    $params = array($editPackageName, $editPackageDesc, $editPackageDate, $editPackageAuthor, $editedPackageId);

    $result = pg_query_params($conn, $query, $params);

    if ($result) {
        pg_query($conn, "COMMIT");

        session_start();
        $_SESSION["msg"] = "Package edited";
        $_SESSION["type"] = "success";
    } else {
        pg_query($conn, "ROLLBACK");

        session_start();
        $_SESSION["msg"] = "Failed to edit the package" . pg_last_error($conn);
        $_SESSION["type"] = "error";
    }
}

header('Location: ./../../index.php');
exit;
