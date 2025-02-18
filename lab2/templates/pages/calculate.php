<style>
    table {
        border-collapse: collapse;
    }

    th {
        background-color: yellow;
        font-size: 30px;
        height: 80px;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<?php

require_once 'functions/func.php';
$x = $_POST['x'];
$y = $_POST['y'];
$xy_result = my_sqrt($x, $y);
$factorial_result = factorial($x);
$my_tg_result = my_tg($x);
$sin_result = my_sin($x);
$cos_result = my_cos($x);
$showTable = true;

?>

<?php if ($showTable): ?>

    <div>
        <table style='background-color: yellow; text-align: center;'>
            <tr>
                <th>x^y</th>
                <th>x!</th>
                <th>tg(x)</th>
                <th>sin(x)</th>
                <th>cos(x)</th>
            </tr>
            <tr>
                <td><?= $xy_result ?></td>
                <td><?= $factorial_result ?></td>
                <td><?= $my_tg_result ?></td>
                <td><?= $sin_result ?></td>
                <td><?= $cos_result ?></td>
            </tr>
        </table>
    </div>

<?php endif ?>