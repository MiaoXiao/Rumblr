<?php
session_write_close();
session_start();

//main error message
$commenttext = $errPost = $posterID = "";

require_once('connect.php');

//include 'posts.php';

if(isset($_POST['likes_enter'])) 
{
	$posterID=$_POST['likes_enter'];
}

//follow field
if(isset($_POST['likes_sub'])) {
	$likesuccess = true;
	
	$query = "SELECT * from posts WHERE postID=$posterID";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		$amount_of_likes = $row['Likes'];
	}
	
	$amount_of_likes = $amount_of_likes + 1;

	$err_post = "Followed!";
	


	//sql following
	$sql_addlikes = "UPDATE posts SET Likes=$amount_of_likes WHERE postID=$posterID";
	if (mysqli_query($conn, $sql_addlikes)) 
	{
    	echo "Record updated successfully";
	} 
	else 
	{
	    echo "Error updating record: " . mysqli_error($conn);
	}
	
	header("Location:index.php");
}

?>