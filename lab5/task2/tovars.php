<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
    <?php
    include 'TovarsFunctions.php';

    $tovars = getTovars();

    if (isset($_POST['add'])) {
        header('Location: insert.php');
        exit;
    }
    if (isset($_POST['delete'])) {
        deleteTovar($_POST['id']);
        header('Location: tovars.php');
        exit;
    }
    ?>
</head>

<body>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>cost</th>
            <th>kol</th>
            <th>date</th>
        </tr>
        <?php foreach ($tovars as $tovar): ?>
            <tr>
                <td><?= $tovar['id'] ?></td>
                <td><?= $tovar['name'] ?></td>
                <td><?= $tovar['cost'] ?></td>
                <td><?= $tovar['kol'] ?></td>
                <td><?= $tovar['date'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <form action="" method="post">
        <input type="submit" name="add" value="Add"><br><br>
        <input type="submit" name="delete" value="delete">
        <input type="text" name="id" placeholder="id">

    </form>
</body>

</html>