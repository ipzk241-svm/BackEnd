<link rel="stylesheet" href="style.css">
<?php
echo "<pre>";
echo "Полину в мріях в купель океану,
Відчую <strong>шовковистість</strong> глибини,
 Чарівні мушлі з дна собі дістану,
   Щоб <strong>взимку</strong>
    <u>тішили</u>
        мене
            вони…
";
echo "</pre>" . "\n\n\n";

function GrnToDolar($grn = "1500", $curse = 41.8)
{
    $dolar = round(intval($grn) / $curse, 2);
    echo "$grn грн. можна обміняти на $dolar долар/ів";
    echo "<br>";
}
function GetSession($monthNum)
{
    if ($monthNum < 3 || $monthNum == 12)
        echo "Зима";
    else if ($monthNum < 6)
        echo "Весна";
    else if ($monthNum < 9)
        echo "Літо";
    else if ($monthNum < 12)
        echo "Осінь";
    echo "<br>";
}

function GetSymbType($symb)
{
    $letter = mb_strtolower($symb);

    switch ($letter) {
        case 'а':
        case 'е':
        case 'є':
        case 'и':
        case 'і':
        case 'ї':
        case 'о':
        case 'у':
        case 'ю':
        case 'я':
            echo "Голосна";
            break;
        default:
            echo "Приголосна";
            break;
    }
    echo "<br>";
}

function OperationsWitnNum($num)
{
    echo "Число --- $num --- <br>";

    $absNum = abs($num);
    $sum = 0;
    $reversed = "";
    while ($absNum > 0) {
        $divReminder = $absNum % 10;
        $sum += $divReminder;
        $reversed .= $divReminder;
        $absNum = (int) ($absNum / 10);
    }
    $numsArr = str_split($reversed);
    arsort($numsArr);
    $maxPossibleNum =  implode("", $numsArr);

    echo "Максимальне число: $maxPossibleNum <br>";
    echo "Сума: $sum <br>";
    echo "Обернене число: $reversed";
}

function randColorTable($rows, $cols)
{
    echo "<table>";
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";

        for ($j = 0; $j < $cols; $j++) {
            $bgColor = '#' . dechex(rand(0x000000, 0xFFFFFF));

            echo "<td style='background-color: $bgColor;'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
function redSquares($numOfSquares)
{
    echo "<div class = 'canvas'>";
    for ($i = 0; $i < $numOfSquares; $i++) {
        $size = mt_rand(10, 100);
        $posY = mt_rand(0, 95);
        $posX = mt_rand(0, 95);

        echo "<div class='square'; style='width:$size;height:$size;top: $posY%;left:$posX%'></div>";
    }
    echo "</div>";
}


GrnToDolar();
echo "<br>";
for ($i = 0; $i < 12; $i++) {
    GetSession($i + 1);
}
echo "<br>";
GetSymbType("А");
GetSymbType("г");
GetSymbType("ь");
echo "<br>";
OperationsWitnNum(mt_rand(100, 999));
echo "<br>";
echo "Таблиця: <br>";
randColorTable(5, 5);
echo "<br>";
redSquares(10);
