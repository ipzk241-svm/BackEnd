<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include 'EmployeesFunctions.php';
$employee = getEmployee($_GET['id']);

if (isset($_POST['update'])) {
    updateEmployee($_GET['id'], $_POST['name'], $_POST['position'], $_POST['salary']);
    header('Location: employees.php');
    exit;
}

?>

<body>
    <form action="" method="post">
        <h2>Update employee <?= $employee['id'] ?></h2>
        <input type="text" name="name" value="<?= $employee['name'] ?>"><br><br>
        <input type="text" name="position" value="<?= $employee['position'] ?>"><br><br>
        <input type="number" name="salary" value="<?= $employee['salary'] ?>" step="0.01" min="0"><br><br>
        <input type="submit" name="update" value="update"><br><br>
        <a href="/task3/employees.php">Back</a>
    </form>
</body>

</html>