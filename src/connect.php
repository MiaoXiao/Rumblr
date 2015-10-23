<?php
//information for connecting to mysql server
$servername = "localhost";
$username = "root";
$password = "";
//what database to search through
$dbname = "testrumblr";

//added for log in to connect to the mySQL database (John)
$bd = mysql_connect($servername, $username, $password) 
	or die("Could not connect database");
	mysql_select_db($dbname, $bd) or die("Could not select database");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

?>
