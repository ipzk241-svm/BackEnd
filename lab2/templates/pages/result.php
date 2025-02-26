
<?php
$login = $_SESSION['login'] ?? "";
$password = $_SESSION['password'];
$passwordRepeat = $_SESSION['passwordRepeat'];
$gender = $_SESSION['gender'];
$favGames = $_SESSION['favGames'];
$about = $_SESSION['about'];
$city = $_SESSION['city'];

?>

<body>
    <table>
        <tr>
            <td>Логін:</td>
            <td><?= $login ?></td>
        </tr>
        <tr>
            <td>Пароль:</td>
            <td>
                <?php if ($password === $passwordRepeat): ?>
                    Пароль введено вірно
                <?php else: ?>
                    Паролі не співпадають
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td>Стать:</td>
            <td>
                <label for=""><?= $gender ?></label>
            </td>
        </tr>
        <tr>
            <td>Місто:</td>
            <td><label for=""><?= $city ?></label></td>
        </tr>
        <tr>
            <td>Улюблені ігри:</td>
            <td>
                <?php foreach ($favGames as $game): ?>
                    <label for=""><?= $game ?>, </label>
                <?php endforeach ?>
            </td>
        </tr>
        <tr>
            <td>Про себе:</td>
            <td><label for=""><?= $about ?></label></td>
        </tr>
        <tr>
            <td>Фотографія:</td>
            <td><img src="<?= $uploadFile ?>" alt="photo" style="width: 300px;"></td>
        </tr>
        <tr>
            <td></td>
            <td><a href=<?= $_SERVER['HTTP_REFERER'] ?>>повернутися на попередню сторінку</a></td>
        </tr>
    </table>
