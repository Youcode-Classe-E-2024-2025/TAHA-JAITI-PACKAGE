<?php
include "connect.php";

$sql = "
SELECT * FROM authors";

$result = pg_query($conn, $sql);

if (!$result) {
    die("error in query" . pg_last_error());
}
?>

<div id="authorsDisplay" class="hidden overflow-x-auto">
    <h1 class="text-center p-10 text-white text-xl font-bold">Authors</h1>
    <table class="w-full border-collapse border border-gray-500 shadow-lg rounded-sm overflow-hidden">
        <thead>
            <tr class="bg-gradient-to-r from-red-700 to-indigo-800 text-white text-sm font-medium uppercase tracking-wide">
                <th class="py-3 px-4 text-left">ID</th>
                <th class="py-3 px-4 text-left">Name</th>
                <th class="py-3 px-4 text-left">Email</th>
                <th class="py-3 px-4"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-700 bg-gray-800 text-gray-300">
            <?php
            while ($row = pg_fetch_array($result)) {
                echo "<tr class='hover:bg-indigo-900 transition-colors'>";
                echo "<td class='py-3 px-4'>" . $row['id'] . "</td>";
                echo "<td class='py-3 px-4'>" . $row["name"] . "</td>";
                echo "<td class='py-3 px-4'>" . $row["email"] . "</td>";
                echo "<td class='py-3 px-4 text-center flex justify-end gap-10'>
                                        <button class='my-2 btn bg-blue-600 hover:bg-blue-700'>EDIT</button>
                                        <form method='post' action='./src/models/deleteAuthor.php'>
                                            <input type='hidden' name='authorDel' value='" . $row['id'] . "' />
                                            <button type='submit' class='my-2 btn bg-red-600 hover:bg-red-700'>DELETE</button>
                                        </form>
                                        </td> 
                                ";
                echo "</tr>";
            }
            ?>


        </tbody>
    </table>
</div>