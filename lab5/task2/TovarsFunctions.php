<?php

function getTovars(): ?array
{
    $dsn = 'mysql:host=localhost;dbname=tovars';
    $dbUser = 'homeuser';
    $dbPass = '1234';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM tov";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        return null;
    }
}

function createTovar(string $name, float $cost, int $kol, string $date): void
{
    $dsn = 'mysql:host=localhost;dbname=tovars';
    $dbUser = 'homeuser';
    $dbPass = '1234';
    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO tov (name, cost, kol, date) VALUES (:name, :cost, :kol, :date)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'cost' => $cost, 'kol' => $kol, 'date' => $date]);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}

function deleteTovar(int $id): void
{
    $dsn = 'mysql:host=localhost;dbname=tovars';
    $dbUser = 'homeuser';
    $dbPass = '1234';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM tov WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
