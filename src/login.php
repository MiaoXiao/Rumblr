<?php
// define variables and set to empty values
$password = $login = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $login = test_input($_POST["login"]);
   $password = test_input($_POST["password"]);
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

//returns true if passwords match
function checkpassword($pass, $passvalid) {
	return ($pass == $passvalid);
}
?>
