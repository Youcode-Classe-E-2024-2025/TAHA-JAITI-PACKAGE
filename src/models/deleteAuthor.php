<?php
include "../../includes/connect.php";

if (isset($_POST["authorDel"])) {
    $deleteAuthorId = $_POST["authorDel"];

    if (!empty($deleteAuthorId)) {
        pg_query($conn, "BEGIN");

        $query = "DELETE FROM authors WHERE id = $1";
        $result = pg_query_params($conn, $query, array($deleteAuthorId));

        if ($result) {
            pg_query($conn, "COMMIT");

            session_start();
            $_SESSION["msg"] = "Author deleted";
            $_SESSION["type"] = "success";
        } else {
            pg_query($conn, "ROLLBACK");

            session_start();
            $_SESSION["msg"] = "Failed to delete the author" . pg_last_error($conn);
            $_SESSION["type"] = "error";
        }
    }
    
    header('Location: ./../../index.php');
    exit;
}
