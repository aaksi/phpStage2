<?php
require_once 'config.php'; //НАСТРОЙКИ БД
require_once 'function.php';

$conn = connect();

// получение
echo '<pre>';
echo 'select <br>';
$sql = "SELECT * FROM users";
$testSelect = select($sql);
print_r($testSelect);


// добавление
echo 'Insert <br>';
$sql = "INSERT INTO users (name, age, photo) VALUES ('city', 111, 'https://images.unsplash.com/photo-1661758239207-0410635ad099?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80')";
$testInsert = execQuery($sql);

var_dump($testInsert);


// обновление
echo 'Update <br>';
$sql = "UPDATE users SET name='new city' WHERE id = 5 ";
$testUpdate = execQuery($sql);

var_dump($testUpdate);



// удалить 
echo 'Delete <br>';
$sql = "DELETE FROM `users` WHERE id = 6";
$testDelete = execQuery($sql);

var_dump($testDelete);
