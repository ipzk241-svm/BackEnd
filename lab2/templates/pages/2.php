<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
// 2.1
function RepeteadElements($array)
{
    $repeated = [];
    for ($i = 0; $i < count($array); $i++) {
        if (in_array($array[$i], $repeated)) {
            continue;
        }
        if (in_array($array[$i], array_slice($array, $i + 1))) {
            array_push($repeated, $array[$i]);
        }
    }
    foreach ($repeated as $value) {
        echo $value . " ";
    }
    return $repeated;
}

// 2.2
function NameGenerator($array)
{
    $name = '';
    $length = rand(2, 4);
    for ($i = 0; $i < $length; $i++) {
        $name .= $array[array_rand($array)];
    }
    $name = mb_str_split($name);
    $name[0] = mb_strtoupper($name[0]);
    $name = implode("", $name);
    return $name;
}

// 2.3

function CreateArray()
{
    $array = [];
    $length = rand(3, 7);
    for ($i = 0; $i < $length; $i++) {
        $array[$i] = rand(10, 20);
    }
    return $array;
}

function CombineGetUniqeSortArray($array1, $array2)
{
    $array = array_merge($array1, $array2);
    $array = array_unique($array);
    sort($array);
    return $array;
}

// 2.4
function SortAsociativeArray($array, $sortByKey = false)
{
    if ($sortByKey) {
        ksort($array);
    } else {
        asort($array);
    }
    return $array;
}

function print_asocArray($array)
{
    foreach ($array as $key => $value) {
        echo $key . " - " . $value . " ";
    }
}
?>

<body>
    <h1>2.1</h1>
    <?php
    $array = [1, 1, 2, 3, 5, 6, 8, 5, 9, 45, 23, 6, 14, 5, 12, 64];
    echo "масив: ";
    foreach ($array as $value) {
        echo $value . " ";
    }

    echo "<br>повторювані числа: ";
    RepeteadElements($array);

    ?>
    <h1>2.2</h1>
    <?php
    $syllabels = ['ба', 'пу', 'ко', 'му', 'та', 'ре', 'ло', 'са', 'ду', 'фа', 'со', 'шок', 'сік'];
    $symbols = ['а', 'б', 'е', 'у', 'р', 'к'];
    echo "згенероване ім'я: " . NameGenerator(array_merge($syllabels, $symbols));
    ?>

    <h1>2.3</h1>
    <?php
    $array1 = CreateArray();
    $array2 = CreateArray();
    echo "масив 1: ";
    print_r($array1);
    echo "<br>масив 2: ";
    print_r($array2);
    echo "<br>оце всі ті дії з масивами: ";
    print_r(CombineGetUniqeSortArray($array1, $array2));
    ?>

    <h1>2.4</h1>
    <?php
    $users = ['Bob' => 25, 'Anny' => 30, 'Mike' => 20, 'Roberto' => 35, 'Pedro' => 40];
    echo "початковий масив: ";
    print_asocArray($users);
    echo "<br>сортування за іменем: ";
    print_asocArray(SortAsociativeArray($users, true));
    echo "<br>сортування за віком: ";
    print_asocArray(SortAsociativeArray($users));
    ?>
</body>

</html>