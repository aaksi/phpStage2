<?php

function t1()
{
  if (($file = fopen('./one/book1.csv', 'r')) !== false) {
    while (($data = fgetcsv($file, 1000, ';')) !== false) {
      for ($i = 0; $i < count($data); $i++) {
        echo $data[$i] . ' ';
      }
      echo "<br>";
    }
    fclose($file);
  }
}

function t2($path)
{

  if (($file = fopen($path, 'r')) !== false) {
    while (($data = fgetcsv($file, 1000, ';')) !== false) {
      for ($i = 0; $i < count($data); $i++) {
        $arr[] = $data[$i];
      }
      // $arr[] = $data;
    }
  }
  fclose($file);
  return $arr;
}

function t3($path)
{
  $pointer = 0;
  if (($file = fopen($path, 'r')) !== false) {
    while (($data = fgetcsv($file, 1000, ';')) !== false) {
      for ($i = 0; $i < count($data); $i++) {
        if ($data[$i] == 'color') {
          $pointer = $i;
        }
      }
      if ($data[$pointer] !== 'color') {

        echo $data[$pointer] . ' ';
      }
      // echo $data[count($data) - 1].' ';
    }
  }
}

function  t4($arr, $path)
{
  $file = fopen($path, 'w');
  foreach ($arr as $line) {
    fputcsv($file, $line,);
  }
  fclose($file);
}

function t5($path)
{
  $count = 0;
  if (($file = fopen($path, 'r')) !== false) {
    while (($data = fgetcsv($file, 1000, ';')) !== false) {
      $count++;
    }
    fclose($file);
  }
  return $count;
}
