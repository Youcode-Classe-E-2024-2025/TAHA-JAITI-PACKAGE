<?php
require_once './includes/connect.php';

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-gray-900 text-white">

    <nav class="flex justify-end w-full p-2 px-4">
        <a href="#" class="bg-cyan-800 px-4 py-1 rounded hover:bg-cyan-800/50">ADD</a>
    </nav>

    <main>
        <h1 class="text-center p-10 text-xl font-bold">Packages</h1>
        
        <table class="w-full">
            <thead>
                <tr class="p-1 px-2 text-left w-full bg-white text-black">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Versions</th>
                    <th>Creation Date</th>
                    <th>Authors</th>
                </tr>
            </thead>
            <tbody class="bg-gray-500 text-black">
                <tr>
                    <td>1</td>
                    <td>FNL</td>
                    <td>MUSIC HAHAHAHAHAHA</td>
                    <td>1.2.0</td>
                    <td>17/7/2024</td>
                    <td>taha,jad,abolah</td>
                </tr>
            </tbody>
        </table>

    </main>

</body>

</html>