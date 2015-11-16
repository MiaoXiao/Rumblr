<?php
session_write_close();
session_start();

//main error message
$err_post = "";

require_once('connect.php');

include 'posts.php';

//follow field
if(isset($_POST['follow_sub'])) {
	$followsuccess = true;
	
	$query = "SELECT * from profile";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		if ($row['username'] == $_POST['follow_enter'])
		{
			$Temp_ID = $row['profileID'];
		}
	}
	
	//create new follow link
	if ($followsuccess)
	{
		$err_post = "Followed!";
		
		//sql following
		$sql_addfollower = "INSERT INTO following (User_ID, Followed_ID)
		VALUES ($_SESSION[SESS_LOGIN_ID], $Temp_ID)";
		
		check_sql($sql_addfollower, $conn);
	}
	header("Location:index.php");
}

?>
