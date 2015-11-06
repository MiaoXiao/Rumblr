<?php

$text = $photo = $quote = $link = $chat = $audio = $video = "";
//main error message
$err_post = "";

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
		//echo "Text created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES (0, 'text', '$text')";
		
		check_sql($sql_addpost, $conn);
		header("Location:index.php");
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
		//echo "Photo created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES (0, 'photo', '$photo')";
		
		check_sql($sql_addpos, $conn);
		header("Location:index.php");
	}
}

//quote field
if(isset($_POST['quote_sub'])) {
	$postsuccess = true;
	
	if (empty($_POST["quote_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$quote = test_input($_POST["quote_enter"]);
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		//echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES (0, 'quote', '$quote')";
		
		check_sql($sql_addpost, $conn);
		header("Location:index.php");
	}
}

//link field
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
		//echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES (0, 'link', '$link')";
		
		check_sql($sql_addpost, $conn);
		header("Location:index.php");
	}
}

//chat field
if(isset($_POST['chat_sub'])) {
	$postsuccess = true;
	
	if (empty($_POST["chat_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$chat = test_input($_POST["chat_enter"]);
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		//echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES (0, 3, '$chat')";
		
		check_sql($sql_addpost, $conn);
		header("Location:index.php");
	}
}

?>
