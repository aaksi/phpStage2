<?php
// update page template

$action = "Update";

if (isset($_POST['submit'])) {
  $title = trim($_POST['title']);
  $url = trim($_POST['url']);
  $descr_min = trim($_POST['descr_min']);
  $description = trim($_POST['descr_full']);
  $cid = $_POST['cid'];

  var_dump($_FILES['image']['tmp_name']);
  if (isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name'] != ''){
    move_uploaded_file($_FILES['image']['tmp_name'], 'static/images/' . $_FILES['image']['name']);
    $image = $_FILES['image']['name'];
  }
  else{
    $image = $result['image'];
  }
  $id = $route[2];

  $update = updateArticles($id, $title, $url, $descr_min, $description, $cid, $image);

  if ($update) {
    setcookie("alert", "update ok", time() + 60 * 2);
    header("location: " .$_SERVER['REQUEST_URI']);
  } else {
    setcookie("alert", "update error", time() + 60 * 2);
    header("location: " . $_SERVER['REQUEST_URI']);
  }
}
if (isset($_COOKIE['alert'])) {
  $alert = $_COOKIE['alert'];
  setcookie("alert", "", time() - 60 * 2);
  unset($_COOKIE['alert']);
  echo $alert;
}
?>

<h1>Update</h1>
<?php
require_once '_form.php';
?>
<div><a href="/admin">выйти</a></div>
