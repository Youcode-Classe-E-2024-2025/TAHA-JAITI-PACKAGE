<?php
include "../../includes/connect.php";

if (isset($_POST["authorEdit"])) {
    $editedAuthorId = $_POST["authorEdit"];

    if (!empty($editedAuthorId)) {
        pg_query($conn, "BEGIN");
    }
}



?>