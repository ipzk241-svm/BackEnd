<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include 'EmployeesFunctions.php';
if (isset($_POST['insert'])) {
    createEmployee($_POST['name'], $_POST['position'], $_POST['salary']);
    header('Location: employees.php');
    exit;
}
?>

<body>
    <form action="" method="post">
        <h2>Add employee</h2>
        <input type="text" name="name" placeholder="name">
        <input type="text" name="position" placeholder="position">
        <input type="number" name="salary">
        <input type="submit" name="insert" value="insert"><br><br>
        <a href="/task3/employees.php">Back</a>
    </form>
</body>

</html>