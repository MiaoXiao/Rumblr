<?php

session_write_close();
session_start();

$text = $photo = $quote = $link = $chat = $audio = $video = "";
//main error message
$err_post = "";

require_once('connect.php');

	//----------------------------------------------------------------------------------------------------//
	//							FUNCTION FOR POSTING ONTO THE MAIN PAGE
	//----------------------------------------------------------------------------------------------------//
	function posting($type_of_post, $toPrint, $username, $privacy, $datePosted, $timePosted) 
	{

			?>
			<table width="75%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1F9CA1">
			<tr>
			<td><table width="50%" border="0" cellpadding="1" cellspacing="1" bgcolor="#1F9CA1">

			<tr>

			<?php if($type_of_post == 'photo')
			{ ?>
				<td bgcolor="#1F9CA1"><strong>PHOTO: <br><a onclick = "hide(3)"> <?php echo $_SESSION["SESS_USERNAME"]; ?>. </a> <br> <?php echo $datePosted;?><br> <?php echo $timePosted;?></strong></td>
				<td bgcolor='#F8F7F1'><img height = '200px' width = '200px' src ="<?php echo $toPrint; ?>"/></td>
						<?php
			}
			else if ($type_of_post == 'link')
			{
			?>
				<td bgcolor="#1F9CA1"><strong>LINK: <br><a onclick = "hide(3)"> <?php echo $_SESSION["SESS_USERNAME"]; ?>. </a> <br> <?php echo $datePosted;?><br> <?php echo $timePosted;?></strong></td>
				<td bgcolor='#F8F7F1'><a href="<?php echo $toPrint;?>"> Link </a></td>
			<?php
			}
			else if ($type_of_post == 'quote')
			{
			?>
				<td bgcolor="#1F9CA1"><strong>QUOTE: <br><a onclick = "hide(3)"> <?php echo $_SESSION["SESS_USERNAME"]; ?>. </a> <br> <?php echo $datePosted;?><br> <?php echo $timePosted;?></strong></td>
				<td bgcolor='#F8F7F1'><?php echo " \"" . $toPrint . "\" "; ?></td>
			<?php	
			}
			else if ($type_of_post == 'chat')
			{
			?>
				<td bgcolor="#1F9CA1"><strong>CHAT: <br><a onclick = "hide(3)"> <?php echo $_SESSION["SESS_USERNAME"]; ?>. </a> <br> <?php echo $datePosted;?><br> <?php echo $timePosted;?></strong></td>
				<td bgcolor='#F8F7F1'><?php echo " \"" . $toPrint . "\" "; ?></td>
			<?php	
			}
			else if ($type_of_post == 'audio')
			{
			?>
				<td bgcolor="#1F9CA1"><strong>AUDIO: <br><a onclick = "hide(3)"> <?php echo $_SESSION["SESS_USERNAME"]; ?>. </a> <br> <?php echo $datePosted;?><br> <?php echo $timePosted;?></strong></td>
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
				<td bgcolor="#1F9CA1"><strong>VIDEO: <br><a onclick = "hide(3)"> <?php echo $_SESSION["SESS_USERNAME"]; ?>. </a> <br> <?php echo $datePosted;?><br> <?php echo $timePosted;?></strong></td>
				<iframe width="420" height="315"
				src="<?php echo $toPrint; ?>">
				</iframe>
			<?php	
			}
			else
			{
			?>
				<td bgcolor="#1F9CA1"><strong>TEXT: <br><a onclick = "hide(3)"> <?php echo $_SESSION["SESS_USERNAME"]; ?>. </a> <br> <?php echo $datePosted;?><br> <?php echo $timePosted;?></strong></td>
				<td bgcolor='#1F9CA1'><?php echo $toPrint; ?></td>
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
		$equal = "=";
		
		$position = stripos($video,$equal);
		
		if($position){
			$offset = $position + 1;
			$Parse = substr($video,$offset,$offset);
		}
		else{
			$err_post = "Incorrect video link!<br>";
			//$postsuccess = false;
		}
		$total="http://www.youtube.com/embed/".$Parse;
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		//echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (postID, type, info)
		VALUES ($_SESSION[SESS_LOGIN_ID], 'video', '$total')";
		
		check_sql($sql_addpost, $conn);
		header("Location:index.php");
	}
}

?>
