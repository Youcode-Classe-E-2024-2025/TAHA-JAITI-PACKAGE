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

    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        $type = $_SESSION['type'];

        echo "<div class='msg {$type} text-2xl'>{$msg}</div>";

        unset($_SESSION["msg"], $_SESSION['result']);
    }
    ?>

    <nav class="flex justify-between w-full p-2 px-4">
        <div class="flex w-1/3 gap-6 justify-between">
            <button id="viewAuthors" class="btn bg-blue-500">AUTHORS</button>
            <button id="viewPackages" class="btn bg-blue-500">PACKAGES</button>
        </div>
        <a href="./views/add.php" class="btn bg-blue-500">ADD</a>
    </nav>

    <main>


        <?php
        include './includes/packagesDisplay.php';
        include './includes/authorsDisplay.php';
        ?>
    </main>


    <script src="./dist/index.js"></script>
    <script src="./dist/cleaner.js"></script>
</body>

</html>