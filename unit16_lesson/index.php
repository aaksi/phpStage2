<?php
require_once 'config.php'; //НАСТРОЙКИ БД




// Create connection
$conn = mysqli_connect(SERVERNAME, USER, PASSWORD, DB);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $res = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $res[] = $row;
  }
  // echo '<pre>';
  // print_r($res);
  $out = '';
  for ($i = 0; $i < count($res); $i++) {
    $out .= '<img src="'.$res[$i]['photo'].'">';
  }
  echo $out;
} else {
  echo "0 results";
}

mysqli_close($conn);
