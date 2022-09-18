<?php

function explodeURL($url)
{
  return explode("/", $url ?? '');
}

function getArticle($url)
{
  $query = "SELECT * FROM info WHERE url='" . $url . "'";
  if (select($query) == NULL) {
    return false;
  } else {
    return select($query)[0];
  }
}

function getCategory($url)
{
  $query = "SELECT * FROM category WHERE url='" . $url . "'";
  if (select($query) == NULL) {
    return false;
  } else {
    return select($query)[0];
  }
}
function getCategoryArticle($cid)
{
  $query = "SELECT * FROM info WHERE cid=" . $cid;
  return select($query);
}

function isLoginExist($login)
{
  $query = "SELECT id from users where login='" . $login . "'";
  $result = select($query);
  if (count($result) === 0) return false;
  return true;
}

function createUser($login, $password)
{
  $password = md5(md5(trim($password)));
  $login = trim($login);
  $query = "INSERT INTO users SET login='" . $login . "', password='" . $password . "'";
  return execQuery($query);
}

function login($login, $password)
{
  $password = md5(md5(trim($password)));
  $login = trim($login);
  $query = "SELECT id, login from users WHERE login='" . $login . "'AND password='" . $password . "'";
  $result = select($query);
  if (count($result) === 0) return false;
  return $result;
}

function generateCode($length = 7)
{
  $chars = 'qwertysadfxbvzxcvafQWERQAXZZXCVBNMFGKIOYT112344536987';
  $code = '';
  $clen = strlen($chars) - 1;
  while (strlen($code) < $length) {
    $code .= $chars[mt_rand(0, $clen)];
  }
  return $code;
}

function updateUser($id, $hash, $ip)
{
  if (is_null($ip)) {
    $query = "UPDATE users SET hash='" . $hash . "' WHERE id=" . $id;
  } else {
    $query = "UPDATE users SET hash='" . $hash . "', ip=INET_ATON('" . $ip . "') WHERE id=" . $id;
  }
  return execQuery($query);
}

function getUser()
{
  if (isset($_COOKIE['id']) && isset($_COOKIE['hash'])) {
    $query = "SELECT id, login, hash, inet_ntoa(ip) as ip FROM users WHERE id=" . intval($_COOKIE['id']);
    $user = select($query);
    if (count($user) === 0) {
      return false;
    } else {
      $user = $user[0];
      if ($user['hash'] !== $_COOKIE['hash']) {
        clearCookies();
        return false;
      }
      if (is_null($user['ip'])) {
        if ($user['ip'] !== $_SERVER['REMOVE_ADDR']) {
          clearCookies();
          return false;
        }
      }
      $_GET['login'] = $user['login'];
      return true;
    }
  } else {
    clearCookies();
    return false;
  }
}

function clearCookies()
{
  setcookie('id', '', time() - 60 * 60 * 24 * 30, '/');
  setcookie('hash', '', time() - 60 * 60 * 24 * 30, '/', null, null, true);
  unset($_GET['login']);
}


function createArticles($title, $url, $descr_min, $description, $cid, $image)
{
  $query = "INSERT INTO info(title, url, descr_min, description, cid, image) VALUES ('" . $title . "', '" . $url . "', '" . $descr_min . "', '" . $description . "', " . $cid . ", '" . $image . "')";
  return execQuery($query);
}
function updateArticles($id, $title, $url, $descr_min, $description, $cid, $image)
{
  $query = "UPDATE info  SET title='" . $title . "', url='" . $url . "', descr_min='" . $descr_min . "', description='" . $description . "', cid=" . $cid . ", image='" . $image . "' WHERE id=" . $id;
  return execQuery($query);
}

function logout(){
  clearCookies();
  header("Location: /");
  exit();
}
