<?php
//information for connecting to mysql server
$servername = "localhost";
$username = "root";
$password = "";
//what database to search through
$dbname = "rumblr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 

//added for log in to connect to the mySQL database (John)
$bd = mysql_connect($servername, $username, $password) 
	or die("Could not connect database");
	mysql_select_db($dbname, $bd) or die("Could not select database");

//return user name based off id
function returnUser($id)
{
	$query = "SELECT * from profile";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		if ($row['profileID'] == $id)
		{
			return $row['username'];
		}
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

//run/check query
function check_sql($queryname, $conn) {
	//check sql statement
	if ($conn->query($queryname) === TRUE) {
		$last_id = $conn->insert_id;
		echo "New record created successfully. Last inserted ID is: " . $last_id;
	} else {
		echo "Error: " . $queryname . "<br>" . $conn->error;
	}
}

?>
