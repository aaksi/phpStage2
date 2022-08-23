<?php

function t1($num, $arr)
{

  if (in_array($num, $arr)) {
    return 'yes';
  } else {
    return 'no';
  }
}

function t2($num, $arr)
{
  $count = 0;
  for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] == $num) {
      $count++;
    }
  }
  return $count;
}

function t3($num, $arr)
{
  $count = 0;
  for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] < $num) {
      $count++;
    }
  }

  return $count;
}

function  t4($num, $arr)
{
  $newArr = [];
  for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] > $num) {
      $newArr[] = $arr[$i];
    }
  }

  return $newArr;
}

function t5($num, $arr)
{
  $count = 0;
  for ($i = 0; $i < count($arr); $i++) {
    if ($num == 'odd' && $arr[$i] % 2) {
      $count++;
    } elseif ($num == 'even' && $arr[$i] % 2 == 0) {
      $count++;
    }
  }
  return $count;
}

function t6($ar)
{
  $newArr = array_reverse($ar);
  return $newArr;
}

function t7($arr)
{
  sort($arr);
  return $arr;
}

function t8($arr)
{
  array_pop($arr);
  return $arr;
}
function t9($arr)
{
  array_shift($arr);
  return $arr;
}

function t10($num, $arr)
{
  if(array_search($num, $arr)){
    return  array_search($num, $arr);
  }
  else {
    return 0;
  }


}
