<?php

function getEmployees(): ?array
{
    $dsn = 'mysql:host=localhost;dbname=company_db';
    $dbUser = 'homeuser';
    $dbPass = '1234';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM employees";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        return null;
    }
}

function getEmployee(int $id): ?array
{
    $dsn = 'mysql:host=localhost;dbname=company_db';
    $dbUser = 'homeuser';
    $dbPass = '1234';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM employees WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        return null;
    }
}

function updateEmployee(int $id, string $name, string $position, float $salary): void
{
    $dsn = 'mysql:host=localhost;dbname=company_db';
    $dbUser = 'homeuser';
    $dbPass = '1234';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE employees SET name = :name, position = :position, salary = :salary WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'name' => $name, 'position' => $position, 'salary' => $salary]);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}

function createEmployee(string $name, string $position, float $salary): void
{
    $dsn = 'mysql:host=localhost;dbname=company_db';
    $dbUser = 'homeuser';
    $dbPass = '1234';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO employees (name, position, salary) VALUES (:name, :position, :salary)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'position' => $position, 'salary' => $salary]);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}

function deleteEmployee(int $id): void
{
    $dsn = 'mysql:host=localhost;dbname=company_db';
    $dbUser = 'homeuser';
    $dbPass = '1234';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM employees WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}

function getEmployeesCount(): ?int
{
    $dsn = 'mysql:host=localhost;dbname=company_db';
    $dbUser = 'homeuser';
    $dbPass = '1234';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT COUNT(*) FROM employees";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['COUNT(*)'];
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        return null;
    }
}

function getAverageSalary(): ?float
{
    $dsn = 'mysql:host=localhost;dbname=company_db';
    $dbUser = 'homeuser';
    $dbPass = '1234';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT AVG(salary) FROM employees";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['AVG(salary)'];
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        return null;
    }
}

function getMaxSalary(): ?float
{
    $dsn = 'mysql:host=localhost;dbname=company_db';
    $dbUser = 'homeuser';
    $dbPass = '1234';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT MAX(salary) FROM employees";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['MAX(salary)'];
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        return null;
    }
}

function getMinSalary(): ?float
{
    $dsn = 'mysql:host=localhost;dbname=company_db';
    $dbUser = 'homeuser';
    $dbPass = '1234';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT MIN(salary) FROM employees";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['MIN(salary)'];
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        return null;
    }
}
