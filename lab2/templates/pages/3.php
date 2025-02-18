<?php
$favGames = ['Шахи', 'Футбол', 'волейбол', 'deadlock', 'dota2'];
$genders = ['чоловік', 'жінка'];
$cities = ['Київ', 'Львів', 'Житомир', 'Харків', 'Дніпро'];
$languages = [
    'ua' => 'Українська',
    'eng' => 'Англійська',
    'pl' => 'Польська',
    'de' => 'Німецька',
    'fr' => 'Французька'
];

$login = $_SESSION['login'];
$password = $_SESSION['password'];
$passwordRepeat = $_SESSION['passwordRepeat'];
$chosenGender = $_SESSION['gender'];
$chosenGames = $_SESSION['favGames'];
$chosenCity = $_SESSION['city'];

$language = $_COOKIE['lang'] ?? "ua";

?>
<div class="flags">
    <a href="?<?= http_build_query(array_merge($_GET, ['lang' => 'ua'])) ?>">
        <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-ua" viewBox="0 0 640 480" width="40px" height="40px">
            <g fill-rule="evenodd" stroke-width="1pt">
                <path fill="gold" d="M0 0h640v480H0z" />
                <path fill="#0057b8" d="M0 0h640v240H0z" />
            </g>
        </svg>
    </a>
    <a href="?<?= http_build_query(array_merge($_GET, ['lang' => 'eng'])) ?>">
        <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-us" viewBox="0 0 640 480" width="40px" height="40px">
            <path fill="#bd3d44" d="M0 0h640v480H0" />
            <path stroke="#fff" stroke-width="37" d="M0 55.3h640M0 129h640M0 203h640M0 277h640M0 351h640M0 425h640" />
            <path fill="#192f5d" d="M0 0h364.8v258.5H0" />
            <marker id="us-a" markerHeight="30" markerWidth="30">
                <path fill="#fff" d="m14 0 9 27L0 10h28L5 27z" />
            </marker>
            <path fill="none" marker-mid="url(#us-a)" d="m0 0 16 11h61 61 61 61 60L47 37h61 61 60 61L16 63h61 61 61 61 60L47 89h61 61 60 61L16 115h61 61 61 61 60L47 141h61 61 60 61L16 166h61 61 61 61 60L47 192h61 61 60 61L16 218h61 61 61 61 60z" />
        </svg>
    </a>
    <a href="?<?= http_build_query(array_merge($_GET, ['lang' => 'pl'])) ?>">
        <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-pl" viewBox="0 0 640 480" width="40px" height="40px">
            <g fill-rule="evenodd">
                <path fill="#fff" d="M640 480H0V0h640z" />
                <path fill="#dc143c" d="M640 480H0V240h640z" />
            </g>
        </svg>
    </a>
    <a href="?<?= http_build_query(array_merge($_GET, ['lang' => 'de'])) ?>">
        <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-de" viewBox="0 0 640 480" width="40px" height="40px">
            <path fill="#fc0" d="M0 320h640v160H0z" />
            <path fill="#000001" d="M0 0h640v160H0z" />
            <path fill="red" d="M0 160h640v160H0z" />
        </svg>
    </a>
    <a href="?<?= http_build_query(array_merge($_GET, ['lang' => 'fr'])) ?>">
        <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-fr" viewBox="0 0 640 480" width="40px" height="40px">
            <path fill="#fff" d="M0 0h640v480H0z" />
            <path fill="#000091" d="M0 0h213.3v480H0z" />
            <path fill="#e1000f" d="M426.7 0H640v480H426.7z" />
        </svg>
    </a>
</div>
<div>
    Вибрана мова: <?= $languages[$language] ?>
</div>
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
                <?php foreach ($genders as $key => $gender): ?>
                    <input type="radio" value="<?= $gender ?>" id="<?= $key . $gender ?>" name="gender" <?= $chosenGender === $gender ? 'checked' : '' ?>>
                    <label for="<?= $key . $gender ?>"><?= $gender ?></label>
                <?php endforeach ?>
            </td>
        </tr>
        <tr>
            <td>Місто:</td>
            <td>
                <select name="city" id="city">
                    <?php foreach ($cities as $city): ?>
                        <option value="<?= $city ?>" <?= $chosenCity === $city ? 'selected' : '' ?>><?= $city ?></option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Улюблені ігри:</td>
            <td>
                <?php foreach ($favGames as $game): ?>
                    <input type="checkbox" name="favGames[]" id="<?= $game ?>" value="<?= $game ?>" <?= in_array($game, $chosenGames) ? 'checked' : '' ?>>
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