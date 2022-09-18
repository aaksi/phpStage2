<?php
// login page template

if (isset($_POST['submit'])) {
  $user = login($_POST['login'], $_POST['password']);
  if ($user) {
    $user = $user[0];
    $hash = md5(generateCode(10));
    $ip = null;

    if (!empty($_POST['ip'])) {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    updateUser($user['id'], $hash, $ip);
    setcookie('id', $user['id'], time() + 60 * 60 * 24 * 30, '/');
    setcookie('hash', $hash, time() + 60 * 60 * 24 * 30, '/');
    header('Location: /admin');
    exit();
  }
} else {
  echo 'Вы не правильно ввели логин или пароль';
}
?>

<h2>Логин</h2>
<form method="POST">
  <span style="display:block">Login: <input type="text" name='login' required value="admin2"></span>
  <span style="display:block">Pass: <input type="text" name='password' required value="admin2"></span>
  <span style="display:block">Прикреплять к IP: <input type="checkbox" name='ip'></span>
  <span style="display:block"><input type="submit" name='submit' value="Войти"></span>
</form>
