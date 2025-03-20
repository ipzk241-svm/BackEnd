<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include 'TovarsFunctions.php';

if (isset($_POST['insert'])) {
    createTovar($_POST['name'], $_POST['cost'], $_POST['kol'], $_POST['date']);
    header('Location: index.php');
    exit;
}
?>

<body>
    <form action="" method="post">
        <h2>Add tovar</h2>
        <input type="text" name="name" placeholder="name">
        <input type="number" name="cost" step="0.01" min="0">
        <input type="number" name="kol" placeholder="kol">
        <input type="date" name="date" placeholder="date">
        <input type="submit" name="insert" value="insert"><br><br>
        <a href="/task2/tovars.php">Back</a>
    </form>

</body>

</html>