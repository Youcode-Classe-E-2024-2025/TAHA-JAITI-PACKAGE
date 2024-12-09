

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ADD</title>
</head>
<body class="bg-black text-white">

    <main>
        <div class="flex justify-between mt-10 p-10">
            <button id="openAuthor" class="btn bg-blue-500">ADD AUTHOR</button>
            <button id="openPackage" class="btn bg-blue-500">ADD PACKAGE</button>
            <button id="openVersion" class="btn bg-blue-500">ADD VERSION</button>
        </div>
    </main>

    <?php 
    include './addAuthor.html';
    ?>
</body>
</html>