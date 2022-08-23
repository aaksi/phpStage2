<?php

function t1()
{
    $a = ['1', 2, true, false, 'hello'];
    return $a;
}

function t2()
{
    $a = [true, false];
    return $a;
}

function t3()
{
    for ($i = 1; $i <= 100; $i++) {
        $a[] = $i;
    }

    return $a;
}

function t4()
{

    $a[10] = 5;
    $a[15] = 11;
    return $a;
}

function t5($ar)
{
    return $ar[5];
}

function t6($ar)
{
    list($ar[2], $ar[4]) = [$ar[4], $ar[2]];
    return $ar;
    // $num = $ar[4];
    // $ar[4] = $ar[2];
    // $ar[2] = $num;
    // return $ar;

}

function t7($arr)
{

    list($arr[0], $arr[count($arr) - 1]) = [$arr[count($arr) - 1], $arr[0]];
    return $arr;
}

function t8($arr)
{
    for ($i = 0; $i <= count($arr); $i++) {
        if ($arr[$i] < 0) {
            return $arr[$i];
            break;
        }
    }
}
function t9($arr)
{
    $array = array_reverse($arr);
    for ($i = 0; $i <= count($array); $i++) {
        if ($array[$i] < 0) {
            return $array[$i];
            break;
        }
    }
}

function t10($num, $arr)
{

    if (in_array($num, $arr)) {
        return 1;
    }
    else{
        return 0;
    }
}
