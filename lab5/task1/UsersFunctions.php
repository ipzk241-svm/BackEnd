<?php


function isUserExists(string $userName, string $userPass): bool
{
    $dsn = 'mysql:host=localhost;dbname=lab5';
    $dbUser = 'root';
    $dbPass = '';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT COUNT(*) FROM users WHERE name = :name AND password = :password";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':name' => $userName, ':password' => $userPass]);

        return $stmt->fetchColumn() > 0;
    } catch (PDOException $e) {
        echo ("Database error: " . $e->getMessage());
        return false;
    }
}

function getUser(string $userName): ?array
{
    $dsn = 'mysql:host=localhost;dbname=lab5';
    $dbUser = 'root';
    $dbPass = '';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM users WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':name' => $userName]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        return null;
    }
}
function createUser($name, $email, $password, $phone_number, $birth_date, $gender, $address, $city, $country): bool
{
    try {
        $dsn = 'mysql:host=localhost;dbname=lab5';
        $dbUser = 'root';
        $dbPass = '';

        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO users (name, email, password, phone_number, birth_date, gender, address, city, country) 
                VALUES (:name, :email, :password, :phone_number, :birth_date, :gender, :address, :city, :country)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
            ':phone_number' => $phone_number,
            ':birth_date' => $birth_date,
            ':gender' => $gender,
            ':address' => $address,
            ':city' => $city,
            ':country' => $country
        ]);

        return true;
    } catch (PDOException $e) {
        echo ("Database error: " . $e->getMessage());
        return false;
    }
}

function updateUser($id, $name, $email, $password, $phone_number, $birth_date, $gender, $address, $city, $country): bool
{
    $dsn = 'mysql:host=localhost;dbname=lab5';
    $dbUser = 'root';
    $dbPass = '';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE users SET name = :name, email = :email, password = :password, phone_number = :phone_number, birth_date = :birth_date, 
                gender = :gender, address = :address, city = :city, country = :country WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
            ':phone_number' => $phone_number,
            ':birth_date' => $birth_date,
            ':gender' => $gender,
            ':address' => $address,
            ':city' => $city,
            ':country' => $country
        ]);

        return true;
    } catch (PDOException $e) {
        echo ("Database error: " . $e->getMessage());
        return false;
    }
}

function deleteUser($id): bool
{
    $dsn = 'mysql:host=localhost;dbname=lab5';
    $dbUser = 'root';
    $dbPass = '';

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        return true;
    } catch (PDOException $e) {
        echo ("Database error: " . $e->getMessage());
        return false;
    }
}
