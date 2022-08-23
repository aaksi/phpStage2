<?php

function t1($a, $b)
{
    global $out1;
    // тут ваш код

    $out1 = $a + $b;

    echo $out1;
}

function t2($a, $b)
{
    // тут ваш код
    return $a + $b;
}

function t3($a, $b)
{
    // тут ваш код
    return max($a, $b);
}

function t4($str)
{
    // тут ваш код
    return trim($str);
}

function t5($a)
{
    // тут ваш код
    if ($a % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

function t6($a)
{
    // тут ваш код
    if (strlen(trim($a)) >= 6) {
        return 1;
    } else {
        return 0;
    }
}

function t7($a)
{
    // тут ваш код
    return date('Y') - $a;
}

function t8($s)
{
    // тут ваш код
    return date('Y') . ' &copy; ' . trim($s);
}
