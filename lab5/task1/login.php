<?php
include 'UsersFunctions.php';
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["submit"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $error = "";
        if (isUserExists($username, $password)) {
            setcookie('isLogged', true, time() + 3600, "/");
            setcookie('username', $username, time() + 3600, "/");
            header('Location: userProfile.php');
            exit;
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Please enter username and password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="login.php" method="POST">
        <h2>Login form</h2>

        <input type="text" name="username" placeholder="username"><br><br>
        <input type="password" name="password" placeholder="password"><br><br>
        <input type="submit" name="submit" value="Login"><br><br>
        <a href="/task1/registry.php">Registry</a><br><br>
        <div><?= $error ?></div>
    </form>
</body>

</html>