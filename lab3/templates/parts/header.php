<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<header>
    <a href="/">ГОЛОВНА</a>
    <ul style="display: flex; gap: 20px; list-style: none; font-size: 20px;">
        <?php
        foreach ($pages as $page) {
            $page = str_replace($directory, '', $page);
            $page = str_replace('.php', '', $page);
            echo "<li><a href='index.php?page=$page'>$page</a></li>";
        }
        ?>
    </ul>
</header>
</body>

</html>