<?php

function t1()
{
  return time();
}

function t2()
{
  return date('D');
}

function t3($year)
{
  return date('L', mktime(0, 0, 0, 1, 1, $year));
}

function  t4()
{
  return date('m');
}

function t5()
{
  return date('Y-m-d G:i');
}

function t6()
{
  $date = date('Y-m-d') . ' 00:00';
  return strtotime($date);
}

function t7($m)
{
  $date = "2022-$m-01";
  echo strtotime($date);
}

function t8($t)
{
  $date = date("D", $t);

  if ($date === "Sat" || $date === "Sun") {
    return 1;
  } else {
    return 0;
  }
}
function t9($s)
{
  $date = strtotime($s);
  $out = floor( (time() - $date ) / (60 * 60 * 24));

  return $out;
}

function t10()
{
  $year = date('Y');
  $out = time() - mktime(0, 0, 0, 1, 1, $year);
  return $out;
}
