<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
include 'EmployeesFunctions.php';

$employees = getEmployees();

if (isset($_POST['add'])) {
    header('Location: addEmployee.php');
    exit;
}
if (isset($_POST['delete'])) {
    deleteEmployee($_POST['id']);
    header('Location: employees.php');
    exit;
}
if (isset($_POST['update'])) {
    header('Location: updateEmployee.php?id=' . $_POST['id']);
    exit;
}
if (isset($_POST['statistics'])) {
    header('Location: employeesStatistics.php');
    exit;
}
?>

<body>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>position</th>
            <th>salary</th>
            <th></th>
        </tr>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $employee['id'] ?></td>
                <td><?= $employee['name'] ?></td>
                <td><?= $employee['position'] ?></td>
                <td><?= $employee['salary'] ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $employee['id'] ?>">
                        <input type="submit" name="delete" value="delete">
                        <input type="submit" name="update" value="update">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        <form action="" method="post">
            <input type="submit" name="add" value="add">
            <input type="submit" name="statistics" value="statistics">
        </form>
    </table>
</body>

</html>