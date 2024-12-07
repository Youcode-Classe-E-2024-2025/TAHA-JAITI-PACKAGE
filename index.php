<?php
require_once './includes/connect.php';

$sql = "SELECT 
p.id AS package_id,
p.name AS package_name,
p.description AS package_description,
p.creation_date AS package_creation_date,
string_agg(a.name, ', ') AS author_names
FROM 
packages p
JOIN 
author_package ap ON p.id = ap.package_id
JOIN 
authors a ON ap.author_id = a.id
LEFT JOIN 
versions v ON p.id = v.package_id
GROUP BY 
p.id, p.name, p.description, p.creation_date;

";

$result = pg_query($conn, $sql);

if (!$result) {
    die("Error" . pg_last_error($conn));
}

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
        
    </main>

</body>

</html>