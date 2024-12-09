<?php
include "connect.php";

$sql = "
SELECT 
    p.id AS package_id,
    p.name AS package_name,
    p.description AS package_description,
    STRING_AGG(DISTINCT a.name, ', ') AS authors,
    STRING_AGG(DISTINCT v.version_number, ', ') AS versions,
    p.creation_date
FROM 
    packages p
LEFT JOIN 
    versions v ON p.id = v.package_id
LEFT JOIN 
    contributions c ON p.id = c.package_id
LEFT JOIN 
    authors a ON c.author_id = a.id
GROUP BY 
    p.id, p.name, p.description, p.creation_date
ORDER BY 
    p.id;
    ";

$result = pg_query($conn, $sql);

if (!$result) {
    die("error in query" . pg_last_error());
}
?>

<div class="overflow-x-auto">
    <table class="w-full border-collapse border border-gray-500 shadow-lg rounded-sm overflow-hidden">
        <thead>
            <tr class="bg-gradient-to-r from-red-700 to-indigo-800 text-white text-sm font-medium uppercase tracking-wide">
                <th class="py-3 px-4 text-left">ID</th>
                <th class="py-3 px-4 text-left">Name</th>
                <th class="py-3 px-4 text-left">Description</th>
                <th class="py-3 px-4 text-left">Authors</th>
                <th class="py-3 px-4 text-left">Versions</th>
                <th class="py-3 px-4 text-left">Creation Date</th>
                <th class="py-3 px-4"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-700 bg-gray-800 text-gray-300">
            <!-- <tr class="hover:bg-indigo-900 transition-colors">
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
            </tr> -->
            <?php
                while ($row = pg_fetch_array($result)) {
                    echo "<tr class='hover:bg-indigo-900 transition-colors'>";
                    echo "<td class='py-3 px-4'>" . $row['package_id'] . "</td>";
                    echo "<td class='py-3 px-4'>" . $row["package_name"] . "</td>";
                    echo "<td class='py-3 px-4'>" . $row["package_description"] . "</td>";
                    echo "<td class='py-3 px-4'>" . $row["authors"] . "</td>";
                    echo "<td class='py-3 px-4'>" . $row["versions"] . "</td>";
                    echo "<td class='py-3 px-4'>" . $row["creation_date"] . "</td>";
                    echo "<td class='py-3 px-4 text-center'>
                                        <button class='my-2 btn bg-blue-600 hover:bg-blue-700'>EDIT</button>
                                        <button class='my-2 btn bg-red-600 hover:bg-red-700'>DELETE</button>
                                        </td> 
                                ";
                    echo "</tr>";
                }
            ?>


        </tbody>
    </table>
</div>