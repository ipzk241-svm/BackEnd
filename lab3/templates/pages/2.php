<?php
$error = '';
if (isset($_POST['login']) && isset($_POST['password'])) {
    if ($_POST['login'] == 'admin' && $_POST['password'] == 'password') {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['isAuth'] = true;
    }
    $error = "Логін або пароль не вірний";
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}

$login = $_SESSION['login'] ?? null;
$password = $_SESSION['password'] ?? null;
$isAuth = $_SESSION['isAuth'] ?? false;
?>

<?php if (!$isAuth) : ?>
    <h1>Авторизуйся</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>login: </td>
                <td><input type="text" name="login" id=""></td>
            </tr>
            <tr>
                <td>password: </td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><?= $error ?></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Вхід</button></td>
            </tr>
        </table>
    </form>
<?php else : ?>
    <h1>Вітаю <?= $login ?></h1>
    <form action="" method="post">
        <button type="submit" name="logout">Вихід</button>
    </form>
<?php endif ?>