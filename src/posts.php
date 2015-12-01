<!DOCTYPE html>
<html>
<head>
<style>

	#singlepost {
	background-color:LightBlue;
    margin: center;
    width: 80%;
    padding: 10px;
	}

	#profPic2 {
	position:relative;
	height: 48px;
    width: 48px;
	max-width: 100%;
   	max-height: 100%;
	padding:0.5%;
	text-align:left;
	float:left;
	}

	#userinfo {
	position:relative;
	text-align:left;
	}

	#following {
		position:relative;
		text-align:right;
	}

	#postInfo{
		margin-left: 1cm;
		word-wrap: break-word;
		margin-right: 1cm;
		margin-bottom: 0.3cm;
	}

</style>
</head>
<body>

<?php

session_write_close();
session_start();

$text = $photo = $quote = $link = $chat = $audio = $video = "";
$temp_username = "";
//main error message
$err_post = "";

require_once('connect.php');

	//----------------------------------------------------------------------------------------------------//
	//							FUNCTION FOR POSTING ONTO THE MAIN PAGE
	//----------------------------------------------------------------------------------------------------//
	function posting($type_of_post, $toPrint, $username, $privacy, $datePosted, $timePosted, $User_ID) 
	{
	?>
		<div id="singlepost">
			<?php
			$follow_success = true;
			
			//check to see if the individual is already being followed
			$query = "SELECT * from following";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result))
			{
				if ($row['User_ID'] == $_SESSION['SESS_LOGIN_ID'] && $row['Followed_ID'] == $User_ID)
				{
					$follow_success = false;
				}
			}
			
			//Display the Follow button on post if valid
			if($User_ID != $_SESSION['SESS_LOGIN_ID'] && $follow_success == true)
			{
			?>
			<form action="follow.php" method="post">
				<div id = "following">
					<input type = "hidden" value = "<?php echo $username ?>" name = "follow_enter"/>
					<input type="submit" value = "Follow" name =  "follow_sub"/>
				</div>
			</form>
			<?php
			}
			?>

			
			<div id="userinfo">
				<img id="profPic2" src ="<?php get_ProfileInfo('photo', $_SESSION['SESS_LOGIN_ID'])?>"/>
				<strong><a onclick = <?php
				if ($_SESSION['SESS_LOGIN_ID']  == $User_ID) echo "hide(3)";
				else
				{
					$_SESSION['PID'] = $User_ID;
					echo "hide(5)";
				}
				?> > <?php echo $username; ?>. </a> <br> <?php echo $datePosted;?><br> <?php echo $timePosted;?></strong>
			</div>

			<div id = "postInfo">
				<?php if($type_of_post == 'photo')
				{ ?>
					<br><strong>PHOTO: </strong><br>
					<td bgcolor='#F8F7F1'><img height = '200px' width = '200px' src ="<?php echo $toPrint; ?>"/></td>
							<?php
				}
				else if ($type_of_post == 'link')
				{
				?>
					<br><strong>LINK: <strong><br>
					<td bgcolor='#F8F7F1'><a href="<?php echo $toPrint;?>"> Link </a></td>
				<?php
				}
				else if ($type_of_post == 'quote')
				{
				?>
					<br><strong>QUOTE: </strong><br>
					<td bgcolor='#F8F7F1'><?php echo " \"" . $toPrint . "\" "; ?></td>
				<?php	
				}
				else if ($type_of_post == 'chat')
				{
				?>
					<strong>CHAT: <br></strong><br>
					<?php echo " \"" . $toPrint . "\" "; ?>
				<?php	
				}
				else if ($type_of_post == 'audio')
				{
				?>
					<br><strong>AUDIO: </strong><br>
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
					<br><strong>VIDEO: </strong><br>
					<iframe width="420" height="315"
					src="<?php echo $toPrint; ?>">
					</iframe>
				<?php	
				}
				else
				{
				?>

					<br><strong>TEXT: </strong><br>
					<?php echo $toPrint; ?> 
				<?php
				}
				?>
			</div>
		</div>
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

</body>
</html>
