<?php

session_write_close();
session_start();

$text = $photo = $quote = $link = $chat = $audio = $video = "";
//main error message
$err_post = "";

require_once('connect.php');

// //information for connecting to mysql server
// $servername = "localhost";
// $username = "root";
// $password = "";
// //what database to search through
// $dbname = "rumblr";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
// die("Connection failed: " . $conn->connect_error);
// } 

// //added for log in to connect to the mySQL database (John)
// $bd = mysql_connect($servername, $username, $password) 
// 	or die("Could not connect database");
// 	mysql_select_db($dbname, $bd) or die("Could not select database");

// function test_input($data) {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);

//   return $data;
// }

// //run/check query
// function check_sql($queryname, $conn) {
// 	//check sql statement
// 	if ($conn->query($queryname) === TRUE) {
// 		$last_id = $conn->insert_id;
// 		echo "New record created successfully. Last inserted ID is: " . $last_id;
// 	} else {
// 		echo "Error: " . $queryname . "<br>" . $conn->error;
// 	}
// }

	//----------------------------------------------------------------------------------------------------//
	//							FUNCTION FOR POSTING ONTO THE MAIN PAGE
	//----------------------------------------------------------------------------------------------------//
	function posting($type_of_post, $toPrint, $username, $privacy, $timePosted) 
	{

			?>
			<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
			<tr>
			<td><table width="30%" border="0" cellpadding="1" cellspacing="1" bgcolor="#BDBDBD">

			<tr>

			<?php if($type_of_post == 'photo')
			{ ?>
				<td bgcolor="#F8F7F1"><strong>PHOTO:</strong></td>
				<td bgcolor='#F8F7F1'><img height = '200px' width = '200px' src ="<?php echo $toPrint; ?>"/></td>
						<?php
			}
			else if ($type_of_post == 'link')
			{
			?>
				<td bgcolor="#F8F7F1"><strong>LINK:</strong></td>
				<td bgcolor='#F8F7F1'><a href="<?php echo $toPrint;?>"> Link </a></td>
			<?php
			}
			else if ($type_of_post == 'quote')
			{
			?>
				<td bgcolor="#F8F7F1"><strong>QUOTE:</strong></td>
				<td bgcolor='#F8F7F1'><?php echo " \"" . $toPrint . "\" "; ?></td>
			<?php	
			}
			else if ($type_of_post == 'chat')
			{
			?>
				<td bgcolor="#F8F7F1"><strong>CHAT:</strong></td>
				<td bgcolor='#F8F7F1'><?php echo " \"" . $toPrint . "\" "; ?></td>
			<?php	
			}
			else if ($type_of_post == 'audio')
			{
			?>
				<td bgcolor="#F8F7F1"><strong>AUDIO:</strong></td>
				<audio controls>
				  <source src="<?php echo $toPrint;?>" type="audio/ogg">
				  <source src="<?php echo $toPrint;?>" type="audio/mpeg">
					Your browser does not support the audio element.
				</audio>
			<?php	
			}
			else if ($type_of_post == 'video')
			{
			?>
				<td bgcolor="#F8F7F1"><strong>Video:</strong></td>
				<video width="320" height="240" controls>
				  <source src="<?php echo $toPrint;?>" type="video/mp4">
				  <source src="<?php echo $toPrint;?>" type="video/ogg">
				Your browser does not support the video tag.
				</video>
			<?php	
			}
			else
			{
			?>
				<td bgcolor="#F8F7F1"><strong>TEXT:</strong></td>
				<td bgcolor="#F8F7F1"><strong><?php echo $username;?>:</strong></td>
				<td bgcolor="#F8F7F1"><strong><?php echo $timePosted;?>:</strong></td>
				<td bgcolor='#F8F7F1'><?php echo $toPrint; ?></td>
			<?php
			}
			?>

			</tr>
			</table></td>
			</tr>
			</table><br>
			<?php
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
		VALUES ($_SESSION[SESS_LOGIN_ID], 'text', '$text')";
		
		check_sql($sql_addpost, $conn);
		header("Location:index.php");
	}
}

//photo field
if(isset($_POST['pic_sub'])) {
	$postsuccess = true;
	if (empty($_POST["pic_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$photo = test_input($_POST["pic_enter"]);
	}
	//create new login and profile if form success
	if ($postsuccess)
	{
		//echo "Photo created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES ($_SESSION[SESS_LOGIN_ID], 'photo', '$photo')";
		
		check_sql($sql_addpost, $conn);
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
		VALUES ($_SESSION[SESS_LOGIN_ID], 'quote', '$quote')";
		
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
		$link = test_input($_POST["link_enter"]);
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		//echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES ($_SESSION[SESS_LOGIN_ID], 'link', '$link')";
		
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
		VALUES ($_SESSION[SESS_LOGIN_ID], 'chat', '$chat')";
		
		check_sql($sql_addpost, $conn);
		header("Location:index.php");
	}
}

//audio field
if(isset($_POST['audio_sub'])) {
	$postsuccess = true;
	
	if (empty($_POST["audio_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$audio = test_input($_POST["audio_enter"]);
	}
	
	echo "I'm here";
	//create new login and profile if form success
	if ($postsuccess)
	{
		echo"I'm being posted";
		//echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES ($_SESSION[SESS_LOGIN_ID], 'audio', '$audio')";
		
		check_sql($sql_addpost, $conn);
		header("Location:index.php");
	}
}

//video field
if(isset($_POST['vid_sub'])) {
	$postsuccess = true;
	
	if (empty($_POST["vid_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$video = test_input($_POST["vid_enter"]);
		//$equal = "=";
		
		//$position = stripos($video,$equal);
		
		//if($position){
		//	$offset = $position + 1;
		//	$Parse = substr($video,$offset,$offset);
		//}
		//else{
		//	$err_post = "Incorrect video link!<br>";
		//	//$postsuccess = false;
		//}
		//$total="http://www.youtube.com/embed/".$Parse;
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		//echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES ($_SESSION[SESS_LOGIN_ID], 'video', '$video')";
		
		check_sql($sql_addpost, $conn);
		header("Location:index.php");
	}
}

?>
