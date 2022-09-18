<?php
// create page template

$action = "Create";

if (isset($_POST['submit'])) {
  $title = trim($_POST['title']);
  $url = trim($_POST['url']);
  $descr_min = trim($_POST['descr_min']);
  $description = trim($_POST['descr_full']);
  $cid = $_POST['cid'];

  move_uploaded_file($_FILES['image']['tmp_name'], 'static/images/' . $_FILES['image']['name']);
  $image = $_FILES['image']['name'];

  $create = createArticles($title, $url, $descr_min, $description, $cid, $image);

  if ($create) {
    header("location: /admin");
  } else {
    setcookie("alert", "create error", time() + 60 * 2);
  }

  if (isset($_COOKIE['alert'])) {
    $alert = $_COOKIE['alert'];
    setcookie("alert", "", time() - 60 * 2);
    unset($_COOKIE['alert']);
    echo $alert;
  }
} else {
  $result = array(
    'title' => '',
    'url' => '',
    'descr_min' => '',
    'description' => '',
    'cid' => '',
    'image' => '',
  );
}
?>

<h1>Create</h1>
<?php
require_once '_form.php';
?>
