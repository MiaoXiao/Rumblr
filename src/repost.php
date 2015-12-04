<?php
session_write_close();
session_start();

//main error message
$err_post = "";

require_once('connect.php');

include 'posts.php';

//follow field
if(isset($_POST['repost_sub'])) {
	$repostsuccess = true;
	
	$query = "SELECT * from posts";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		if($row['postID'] == $_POST['repost_enter'])
		{
			//session_destroy();
			$type = $row['type'];
			$info = $row['info'];
			$repost = true;
			
		}
	}
	$sessionid = $_SESSION['SESS_LOGIN_ID'];
	
	//create new follow link
	if ($repostsuccess)
	{
		$err_post = "Reposted!";
		
		//sql following
		$sql_addpost = "INSERT INTO posts (User_ID, IsRepost, type, info)
		VALUES ('$sessionid', '$repost', '$type', '$info')";
		
		check_sql($sql_addpost, $conn);
	}
	header("Location:index.php");
}

?>
