<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <?php
    include 'UsersFunctions.php';
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone_number = $_POST['phone_number'] ?? '';
        $birth_date = $_POST['birth_date'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $address = $_POST['address'] ?? '';
        $city = $_POST['city'] ?? '';
        $country = $_POST['country'] ?? '';

        if (getUser($name)) {
            echo 'User already exists';
        } else if (createUser($name, $email, $password, $phone_number, $birth_date, $gender, $address, $city, $country)) {
            header('Location: login.php');
        } else {
            echo 'Error creating user';
        }
    }
    ?>

</head>

<body>
    <h2>Registration Form</h2>
    <form action="registry.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number"><br><br>

        <label for="birth_date">Birth Date:</label>
        <input type="date" id="birth_date" name="birth_date"><br><br>

        <label>Gender:</label>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address"></textarea><br><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city"><br><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country"><br><br>

        <input type="submit" name="submit" value="Register">
        <a href="/task1/login.php">Login</a>
    </form>
</body>

</html>