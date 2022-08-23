<?php

function t1()
{
  $res = file_get_contents('one/book1.json');
  $date = json_decode($res, true);
  $out = '';

  // $arrKeys = array_keys($date);
  // for($i = 0; $i < count($arrKeys); $i++){
  //   $out .= $arrKeys[$i] . ' ' . $date[$arrKeys[$i]] . '<br>'; 
  // }

  foreach ($date as $key => $value) {
    $out .= $key . ' ' . $value . "<br>";
  }

  print_r($out);
}

function t2($path)
{
  $res = file_get_contents($path);
  $date = json_decode($res, true);

  return $date;
}

function t3($path)
{
  $res = file_get_contents($path);
  $date = json_decode($res, true);
  $out = '';
  $param = 'name';
  foreach($date as $item){
    $out .= $item[$param].' ';
  }

  return $out;

}

function  t4($arr, $path)
{
  $jsonData = json_encode($arr);
  file_put_contents($path, $jsonData);
}

function t5($path)
{
  $res = file_get_contents($path);
  $date = json_decode($res, true);
  $out = count($date);

  return $out;
}
