<?php
session_write_close();
session_start();

require_once('connect.php');

if(isset($_POST['favorites_sub']))
{
		$user_id = $_SESSION['SESS_LOGIN_ID'];
		$post_id = $_POST['favorites_enter'];
		
		//sql add favorites row
		$sql_fav = "INSERT INTO favorites (Post_ID, User_ID)
		VALUES ('$post_id', '$user_id')";
		check_sql($sql_fav, $conn);
		
		echo $sql_fav;
		
		//add favorited tag to the posts
		$sql_favtag = "INSERT INTO tags (Post_ID, Tag_label)
		VALUES ('$post_id', 'favorite')";
		check_sql($sql_favtag, $conn);
		
		echo $sql_favtag;
		
		header("Location:index.php");
}
	
?>
