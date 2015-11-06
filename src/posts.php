<?php

$text = $photo = $quote = $link = $chat = $audio = $video = "";
//main error message
$err_post = "";

//text field
if(isset($_POST['link_sub'])) {
	$postsuccess = true;
	
	if (empty($_POST["link_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$text = test_input($_POST["link_enter"]);
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES (0, 3, '$link')";
		
		check_sql($sql_addpost, $conn);
	}
}

//text field
if(isset($_POST['text_sub'])) {
	$postsuccess = true;
	
	if (empty($_POST["text_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$text = test_input($_POST["text_enter"]);
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		echo "Text created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES (0, 1, '$text')";
		
		check_sql($sql_addpost, $conn);
	}
}


//photo field
if(isset($_POST['photo_sub'])) {
	if (empty($_POST["photo_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$photo = test_input($_POST["photo_enter"]);
	}
	//create new login and profile if form success
	if ($postsuccess)
	{
		echo "Photo created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES (0, photo, '$photo')";
		
		check_sql($sql_addpos, $conn);
	}
}


?>
