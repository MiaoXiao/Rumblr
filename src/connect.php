<?php
//information for connecting to mysql server
$servername = "localhost";
$username = "root";
$password = "";
//what database to search through
$dbname = "testrumblr";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
