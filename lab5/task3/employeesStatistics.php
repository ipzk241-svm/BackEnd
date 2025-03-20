<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include 'EmployeesFunctions.php';

?>

<body>
    <h2>Employees statistics</h2>
    <h3>Employees count: <?= getEmployeesCount() ?></h3>
    <h3>Average salary: <?= getAverageSalary() ?></h3>
    <h3>Max salary: <?= getMaxSalary() ?></h3>
    <h3>Min salary: <?= getMinSalary() ?></h3>
    <a href="/task3/employees.php">Back</a>
</body>

</html>