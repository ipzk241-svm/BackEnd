<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    include 'UsersFunctions.php';

    $isLogged = $_COOKIE['isLogged'] ?? false;
    if (!$isLogged) {
        header('Location: login.php');
        exit;
    }

    $user = getUser($_COOKIE['username']);

    if (isset($_POST['submit'])) {
        $id = $user["id"];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone_number = $_POST['phone_number'] ?? $user["phone_number"];
        $birth_date = $_POST['birth_date'] ?? $user["birth_date"];
        $gender = $_POST['gender'] ?? $user["gender"];
        $address = $_POST['address'] ?? $user["address"];
        $city = $_POST['city'] ?? $user["city"];
        $country = $_POST['country'] ?? $user["country"];

        if (updateUser($id, $name, $email, $password, $phone_number, $birth_date, $gender, $address, $city, $country)) {
            setcookie('username', $name, time() + 3600, "/");
            header('Location: userProfile.php');
            exit;
        }
    }

    if (isset($_POST['exit'])) {
        setcookie('isLogged', false, time() - 3600, "/");
        setcookie('username', '', time() - 3600, "/");
        header('Location: login.php');
        exit;
    }

    if (isset($_POST['delete'])) {
        deleteUser($user["id"]);
        setcookie('isLogged', false, time() - 3600, "/");
        setcookie('username', '', time() - 3600, "/");
        header('Location: login.php');
        exit;
    }
    ?>
</head>

<body>
    <?php if ($user): ?>
        <div>Welcome <?= $user["name"] ?></div>
        <h2>Edit info</h2>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= $user["name"] ?>" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $user["email"] ?>" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?= $user["password"] ?>" required><br><br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="<?= $user["phone_number"] ?>"><br><br>

            <label for="birth_date">Birth Date:</label>
            <input type="date" id="birth_date" name="birth_date" value="<?= $user["birth_date"] ?>"><br><br>

            <label>Gender:</label>
            <select name="gender">
                <option value="male" <?= $user["gender"] == "male" ? "selected" : "" ?>>Male</option>
                <option value="female" <?= $user["gender"] == "female" ? "selected" : "" ?>>Female</option>
                <option value="other" <?= $user["gender"] == "other" ? "selected" : "" ?>>Other</option>
            </select><br><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address"><?= $user["address"] ?></textarea><br><br>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="<?= $user["city"] ?>"><br><br>

            <label for="country">Country:</label>
            <input type="text" id="country" name="country" value="<?= $user["country"] ?>"><br><br>

            <input type="submit" name="submit" value="Edit"><br><br>
            <input type="submit" name="exit" value="Exit"><br><br>
            <input type="submit" name="delete" value="Delete"><br><br>
        </form>
    <?php endif; ?>

</body>

</html>