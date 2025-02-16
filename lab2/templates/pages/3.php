<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<?php
$favGames = ['Шахи', 'Футбол', 'волейбол', 'deadlock', 'dota2'];

$login = $_SESSION['login'];
$password = $_SESSION['password'];
$passwordRepeat = $_SESSION['passwordRepeat'];
$gender = $_SESSION['gender'];
$chosenGames = $_SESSION['favGames'];


?>

<form action="index.php" method="post" enctype="multipart/form-data">

    <table>
        <tr>
            <td>Логін:</td>
            <td><input type="text" name="login" value=<?= $login ?? "" ?>></td>
        </tr>
        <tr>
            <td>Пароль:</td>
            <td><input type="password" name="password" value=<?= $password ?? "" ?>></td>
        </tr>
        <tr>
            <td>Пароль (ще раз):</td>
            <td><input type="password" name="passwordRepeat" value=<?= $passwordRepeat ?? "" ?>></td>
        </tr>
        <tr>
            <td>Стать:</td>
            <td>
                <input type="radio" name="gender" id="man" value="чоловік">
                <label for="man">чоловік</label>
                <input type="radio" name="gender" id="woman" value="жінка">
                <label for="woman">жінка</label>
            </td>
        </tr>
        <tr>
            <td>Улюблені ігри:</td>
            <td>
                <?php foreach ($favGames as $game): ?>
                    <input type="checkbox" name="favGames[]" id="<?= $game ?>" value="<?= $game ?>">
                    <label for="<?= $game ?>"><?= $game ?></label>
                <?php endforeach ?>
            </td>
        </tr>
        <tr>
            <td>Про себе:</td>
            <td><textarea name="about" id="" value=<?= $about ?? "" ?>></textarea></td>
        </tr>
        <tr>
            <td>Фотографія:</td>2
            <td><input type="file" name="userPhoto" id="userPhoto"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Зареєструватися"></td>
        </tr>
    </table>
</form>

<body>

</body>

</html>