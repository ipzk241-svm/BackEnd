<?php
function my_sin($x)
{
    return sin(deg2rad($x));
}

function my_cos($x)
{
    return cos(deg2rad($x));
}

function my_tg($x)
{
    return sin($x) / cos($x);
}

function my_sqrt($x, $y)
{
    return pow($x, $y);
}

function factorial($x)
{
    if ($x < 0) {
        return "Факторіал визначений лише для невід’ємних чисел";
    }
    if ($x == 0 || $x == 1) {
        return 1;
    }
    return $x * factorial($x - 1);
}
