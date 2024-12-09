<?php
include "../../includes/connect.php";

if (isset($_POST["packageDel"])) {
    $deletePackageId = $_POST["packageDel"];

    if (!empty($deletePackageId)) {
        pg_query($conn, "BEGIN");

        $query = "DELETE FROM packages WHERE id = $1";
        $result = pg_query_params($conn, $query, array($deletePackageId));

        if ($result) {
            pg_query($conn, "COMMIT");

            session_start();
            $_SESSION["msg"] = "Package deleted";
            $_SESSION["type"] = "success";
        } else {
            pg_query($conn, "ROLLBACK");

            session_start();
            $_SESSION["msg"] = "Failed to delete the package" . pg_last_error($conn);
            $_SESSION["type"] = "error";
        }
    }
    
    header('Location: ./../../index.php');
    exit;
}
