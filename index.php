<tr?php
require_once './includes/connect.php';

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Document</title>
</head>

<body class="bg-black text-white">

    <nav class="flex justify-end w-full p-2 px-4">
        <a href="#" class="bg-red-700 px-4 py-1 rounded-sm hover:bg-red-800">ADD</a>
    </nav>

    <main>
        <h1 class="text-center p-10 text-xl font-bold">Packages</h1>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-white shadow-lg rounded-sm overflow-hidden">
                <thead >
                    <tr class="bg-gradient-to-r from-red-700 to-indigo-800 text-white text-sm font-medium uppercase tracking-wide">
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Name</th>
                        <th class="py-3 px-4 text-left">Description</th>
                        <th class="py-3 px-4 text-left">Versions</th>
                        <th class="py-3 px-4 text-left">Creation Date</th>
                        <th class="py-3 px-4 text-left">Authors</th>
                        <th class="py-3 px-4"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700 bg-gray-800 text-gray-300">
                    <tr class="hover:bg-indigo-900 transition-colors">
                        <td class="py-3 px-4">2</td>
                        <td class="py-3 px-4">TEST</td>
                        <td class="py-3 px-4">TESTTETSTSTETSTETSTTETST</td>
                        <td class="py-3 px-4">1.1.0</td>
                        <td class="py-3 px-4">2024/07/12</td>
                        <td class="py-3 px-4">Test test</td>
                        <td class="py-3 px-4 text-center">
                            <button class="btn bg-blue-600 hover:bg-blue-700">
                                EDIT
                            </button>
                            <button class="btn bg-red-600 hover:bg-red-700">DELETE</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

</body>

</html>