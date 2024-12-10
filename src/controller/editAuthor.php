<?php
include "../../includes/connect.php";

if (isset($_POST["editAuthorSubmit"])) {
    $editedAuthorId = $_POST["editedAuthorId"];
    $editedAuthorName = $_POST["editAuthorName"];
    $editedAuthorMail = $_POST["editAuthorMail"];

    if (!empty($editedAuthorId) && !empty($editedAuthorName) && !empty($editedAuthorMail)) {
        pg_query($conn, "BEGIN");

        $query = "UPDATE authors SET name = $1, email = $2 WHERE id = $3";
        $result = pg_query_params($conn, $query, array($editedAuthorName, $editedAuthorMail, $editedAuthorId));

        if ($result) {
            pg_query($conn, "COMMIT");

            session_start();
            $_SESSION["msg"] = "Author edited";
            $_SESSION["type"] = "success";
        } else {
            pg_query($conn, "ROLLBACK");

            session_start();
            $_SESSION["msg"] = "Failed to edit the author" . pg_last_error($conn);
            $_SESSION["type"] = "error";
        }
    }
}

header('Location: ./../../index.php');
exit;
