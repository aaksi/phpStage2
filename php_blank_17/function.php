<?php

function t2()
{
  $query = "SELECT * FROM cars";
  return select($query);
}

function t3()
{
  $query = "SELECT * FROM cars";
  $arr = select($query);
  $out = [];

  // for($i = 0; $i < count($arr); $i++){
  //   if($arr[$i]['cost'] > 100000){
  //     $out[] = $arr[$i]['cars'];
  //   } 
  // }
  foreach ($arr as $car) {
    if ($car['cost'] > 100000) {
      $out[] = $car['cars'];
    }
  }
  return $out;
}

function  t4()
{
  $query = "SELECT * FROM cars";
  $arr = select($query);
  $out = [];

  foreach ($arr as $car) {
    $out[] = $car['cars'];
  }

  return $out;
}

function t5()
{
  $query = "INSERT INTO `cars`( `cars`,`cost`, `image`) VALUES ('Cadillac Escalade Platinum', 47777,'http://elite.cars.ua/img/upload/cache/zc-1_iar-1_h-357_w-570_5ecd1aa8a55af0_68546755.jpg')";
  return execQuery($query);
}

function t6()
{
  $query = "UPDATE cars SET cars='Cadillac Escalade', cost= 47500  WHERE id = 6";
  return execQuery($query);
}

function t7()
{
  $query = "SELECT * FROM cars";
  $arr = select($query);
  $sale = 2800;
  $out = false;

  for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i]['cost'] > 100000 && $arr[$i]['cost'] < 200000) {
      $id = $i + 1;
      // (int)$id;
      $carCostNew = $arr[$i]['cost'] - $sale;
      $queryUpdate = "UPDATE cars SET  cost=$carCostNew WHERE id = $id ";
      execQuery($queryUpdate);
      $out = true;
    }
  }

  return $out;
}

function t8()
{
  $query = "SELECT * FROM cars";
  $arr = select($query);
  $out = 0;
  
  foreach($arr as $car){
    $out += $car['cost'];
  }
  return $out;
}

function t9()
{
  $query = "SELECT * FROM cars";
  $arr = select($query);
  $out = [];

  foreach($arr as $car){
    $out[$car['cars']] = $car['cost'];
  }
  return $out;
}

function t10()
{
  $query = "DELETE FROM `cars` WHERE id=6";
  return execQuery($query);
}
