<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
</head>

<?php
$text = '';
$find = '';
$replace = '';
$result = '';
$fileName = '';
$cities = '';
$interval = '';
$password = '';
$passwordSecure = '';

// 1.1
if (isset($_POST['text'])) {

    $text = $_POST['text'];
    $find = $_POST['find'];
    $replace = $_POST['replace'];
    $result = $_POST['result'];

    $result = str_replace($find, $replace, $text);
}
// 1.2
if (isset($_POST['cities'])) {
    $cities = $_POST['cities'];
    $cities = explode(' ', $cities);
    sort($cities);
    $cities = implode(', ', $cities);
}
// 1.3
if (isset($_POST['path'])) {
    $path = $_POST['path'];
    $fileName = substr($path, strrpos($path, '\\') + 1);
    $dotPos = strrpos($fileName, '.');
    $fileName = substr($fileName, 0, $dotPos ?: strlen($fileName));
}

// 1.4
if (isset($_POST['date1'])) {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $date1 = new DateTime($date1);
    $date2 = new DateTime($date2);
    $interval = $date1->diff($date2)->format('%a днів');
}

// 1.5
if (isset($_POST['length'])) {
    $length = intval($_POST['length']);
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
    $charsLength = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, $charsLength - 1)];
    }
    if (checkIfPasswordStrong($password))
        $passwordSecure = 'Пароль надійний';
    else
        $passwordSecure = 'Пароль не надійний';
}

function checkIfPasswordStrong($password)
{
    $upperChars = preg_match('@[A-Z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if ($upperChars && $number && $specialChars && strlen($password) >= 8) {
        return true;
    } else {
        echo false;
    }
}
?>

<body>
    <h1>1.1</h1>

    <form action="" method="post">
        <table>
            <tbody>
                <tr>
                    <td>Текст</td>
                    <td>
                        <textarea name="text" id=""><?= $text ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Знайти
                    </td>
                    <td>
                        <input type="text" name="find" id="" value=<?= $find ?>>
                    </td>
                </tr>
                <tr>
                    <td>
                        Замінити
                    </td>
                    <td>
                        <input type="text" name="replace" id="" value=<?= $replace ?>>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">виконати</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        Результат
                    </td>
                    <td>
                        <textarea name="result" id=""><?= $result ?></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <h1>1.2</h1>
    <form action="" method="post">

        <table>
            <tr>
                <td>Міста</td>
                <td><input type="text" name="cities" id=""></td>
            </tr>
            <tr>
                <td><button type="submit">Впорядкувати</button></td>
            </tr>
            <tr>
                <td></td>
                <td><?= $cities ?></td>
            </tr>
        </table>
    </form>
    <h1>1.3</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Шлях до файлу</td>
                <td><input type="text" name="path" id=""></td>
            </tr>
            <tr>
                <td><button type="submit">Відправити</button></td>
                <td><?= $fileName ?></td>
            </tr>
        </table>
    </form>
    <h1>1.4</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Дата1</td>
                <td>
                    <input type="date" name="date1" id="">
                </td>
            </tr>
            <tr>
                <td>Дата2</td>
                <td>
                    <input type="date" name="date2" id="">
                </td>
            </tr>
            <tr>
                <td>Різниця</td>
                <td><?= $interval ?></td>
            </tr>
            <tr>
                <td><button type="submit">Відправити</button></td>
        </table>
    </form>
    <h1>1.5</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Довжина паролю</td>
                <td><input type="number" name="length" min="0"></td>
            </tr>
            <tr>
                <td>Сгенерований пароль</td>
                <td><input type="text" value=<?= $password ?>></td>
                <td><label for=""><?= $passwordSecure ?></label></td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Згенерувати</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php
