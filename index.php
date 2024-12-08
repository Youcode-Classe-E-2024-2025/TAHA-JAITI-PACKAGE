<?php
require_once './includes/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Package Maneger</title>
</head>

<body class="bg-black text-white">

    <nav class="flex justify-end w-full p-2 px-4">
        <a href="#" class="bg-red-700 px-4 py-1 rounded-sm hover:bg-red-800">ADD</a>
    </nav>

    <main>
        <h1 class="text-center p-10 text-xl font-bold">Packages</h1>

        <?php 
            include "./includes/display.php";
        ?>
        
    </main>

</body>

</html>