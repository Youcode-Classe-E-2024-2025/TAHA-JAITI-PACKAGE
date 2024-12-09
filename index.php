<?php
require_once './includes/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Package Maneger</title>
</head>

<body class="bg-black ">
    <?php 
        session_start();

        if (isset($_SESSION['msg'])){
            $msg = $_SESSION['msg'];
            $type = $_SESSION['type'];

            echo "<div class='msg {$type} text-2xl'>{$msg}</div>";

            unset($_SESSION["msg"], $_SESSION['result']);
        }
    ?>

    <nav class="flex justify-end w-full p-2 px-4">
        <a href="./views/add.php" class="btn bg-blue-500">ADD</a>
    </nav>

    <main>
        <h1 class="text-center p-10 text-xl font-bold">Packages</h1>
        
        <?php 
            include './includes/display.php';
        ?>
        
    </main>


    <script src="./dist/cleaner.js"></script>
</body>

</html>