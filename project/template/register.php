<?php
// register page template
if (isset($_POST['submit'])) {
  $error = [];
  if (strlen($_POST['login']) < 4 || strlen($_POST['login']) > 30) {
    $error[] = 'Логин не меньше 4 и не больше 30';
  }
  if (isLoginExist($_POST['login'])) {
    $error[] = 'Логин существует ';
  }
  if ( count($error) === 0) {
    createUser($_POST['login'], $_POST['password']);
    header('Location: /login');
    exit();
  } else {
    echo '<h4>Ошибки регистрации</h4>';
    foreach ($error as $item) {
      echo $item . '<br>';
    }
  }
}
?>

<h2>Регистрация</h2>
<form method="POST">
  <span style="display:block">Login: <input type="text" name='login' required></span>
  <span style="display:block">Pass: <input type="text" name='password' required></span>
  <span style="display:block"><input type="submit" name='submit' value="Регистрация"></span>
</form>
