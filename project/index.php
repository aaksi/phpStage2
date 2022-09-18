<?php

require_once 'config/db.php';
require_once 'core/function_db.php';
require_once 'core/function.php';

$conn = connect();

$route = $_GET['route'] ?? NULL; //NULL 
$route = explodeURL($route);


//main - главная 
//cat - категории 
//article - статья

switch ($route) {
  case $route[0] == '':
    $query = 'SELECT * FROM info';
    $result = select($query);
    require_once 'template/main.php';
    break;
  case ($route[0] == 'article' && isset($route[1]));
    $url = $route[1];
    $result = getArticle($url);
    if ($result === false) {
      require_once 'template/404.php';
    } else {
      require_once 'template/article.php';
    }
    break;
  case ($route[0] == 'cat' && isset($route[1]));
    $url = $route[1];
    $cat = getCategory($url);
    if($cat === false){
      require_once 'template/404.php';
      break;
    }

    $result = getCategoryArticle($cat['id']);
    require_once 'template/cat.php';
    break;
  case ($route[0] == 'register');
    require_once 'template/register.php';
    break;
  case ($route[0] == 'login');
    require_once 'template/login.php';
    break;
  case ($route[0] === 'admin' && isset($route[1]) && $route[1] === 'delete' && isset($route[2]) );
    if(getUser()){
      $query = "DELETE FROM info WHERE id=".$route[2];
      execQuery($query);
      header("location: /admin");
      exit();
    }
    header("location: /");
    break;
  case ($route[0] === 'admin' && isset($route[1]) &&  $route[1] === 'create'  );
    if(getUser()){
      $query = "SELECT id, title FROM category";
      $category = select($query);
      require_once 'template/create.php';
    }
    else{
      header("location: /");
    }
    break;
  case ($route[0] === 'admin' && isset($route[1]) &&  $route[1] === 'update' &&  isset($route[2]));
    if(getUser()){
      $query = "SELECT id, title FROM category";
      $category = select($query);
      $query = "SELECT  * FROM info WHERE id=".$route[2];
      $result = select($query)[0];
      require_once 'template/update.php';
    }

    break;
  case ($route[0] == 'admin');
    $query = 'SELECT * from info';
    $result = select($query);
    require_once 'template/admin.php';
    break;
  case ($route[0] == 'logout');
    require_once 'template/logout.php';
    break;
  default;
    require_once('template/404.php');
}
