<!DOCTYPE html>
<script src="handling.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" 
integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" 
crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>


<?php
	include('login.php');
	if(	isset($_SESSION['SESS_USERNAME']))
	{
		//echo "I'm In";
		//echo "The current session is: " . session_id();
		//echo $_SESSION['SESS_AUDIO_FILE_PATH'];
		//echo $_SESSION['SESS_ACTUAL_USER'];
	}
	else
	{
		echo session_status();
	}
?>

<html>
<body style="background-color:DarkCyan" >
	<head> 
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="handling.js"></script>
		<?php //include 'connect.php';?>
		<?php include 'createacc.php';?>
		<?php include 'updateprofile.php';?>
		<?php include 'posts.php';?>
		<?php include 'inbox.php';?>
		<?php include 'comment.php';?>
		<?php //include 'login.php';?>
	</head>
	<div id = "header" role = "navigation">
		<header id = "title">
			<h1 >UCRumbler</h1>
		</header>
	</div>
	
	<div id = "Body">
				
				
		<div id = "navi">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->

					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a onclick = "hide(2)">Front Page</a></li>
							<li><a onclick = "hide(3)"> Welcome, <?php $temp_ID = $_SESSION['SESS_LOGIN_ID']; echo $_SESSION['SESS_ACTUAL_USER']; ?>. </a></li>
							<li><a onclick = "hide(4)">Inbox</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Submit Post <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a onclick = "post(0)">Text</a></li>
									<li><a onclick = "post(1)">Photo</a></li>
									<li><a onclick = "post(2)">Quote</a></li>
									<li><a onclick = "post(3)">Link</a></li>
									<li><a onclick = "post(5)">Audio</a></li>
									<li><a onclick = "post(6)">Video</a></li>
								</ul>
							</li>
						</ul>
						
					<div class="navbar-form navbar-left" role="search">
						<form method="post" action="posts.php">
							<div class="form-group">
								<input type="text" style="color:darkCyan" name="search_enter"class="form-control" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-default" name = "search">Submit</button>
						</form>
					</div>
					
					<ul class="nav navbar-nav">
						<li><a href= "http://localhost:80/Rumblr/Rumblr/src/logout.php">Sign out?</a></li>
						<!--<a href= "http://localhost:80/Rumblr/src/logout.php">Sign out?</a>-->
					</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
		
		
		<div id = "login" class = "container">
			<?php if (!isset($_SESSION['SESS_USERNAME'])) 
			{ 
				?> 
					<form method="post" action="login.php">
						Username:<br>
						<input type="text" id = "userIn" name = "login"/>
						<br>
						Password: <br>
						<input type="password" id = "passIn" name = "password"/>
						<br> <br>
						<input type ="submit" Value = "Login" name = "verifiedLogin"/>
						<input type ="button" onclick = "hide(1)" Value = "Create Account"/>
					</form>
				<?php 
			} 
			else
			{
			?>
					You have successfully logged in!<br>
					Welcome <?php echo $_SESSION['SESS_ACTUAL_USER']; ?> ! <br>
					<button type="button" onclick="hide(2)">Continue</button>
				<?php
			}
			?>
		</div>
	
		<div id = "createAcc">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				 
				First Name: <br>
				<span class="error"> <?php ?></span>
				<input type="text" id = "fnameAcc" name = "fname_enter"/>
				
				<br>
				Last Name: <br>
				<span class="error"> <?php ?></span>
				<input type="text" id = "lnameAcc" name = "lname_enter"/>
				<br>
				
				Gender: <br>
				<span class="error"> <?php ?></span>
				<input type="radio" id = "genderAcc" name = "sex"  value="Male"> Male
				<input type="radio" id = "genderAcc" name = "sex"  value="Female"> Female
				<br>
				
				Birthday: <br>
				<span class="error"> <?php ?></span>
				<input type="date" id = "birthdayAcc" name = "birthday_enter"/>
				<br>
				
				Create Username: <br>
				<span class="error"> <?php ?></span>
				<input type="text" id = "usernameAcc" name = "username_enter"/>
				<br>
				
				Create Login: <br>
				<span class="error"> <?php ?></span>
				<input type="text" id = "loginAcc" name = "login_enter"/>
				<br>
				
				Create Password: <br>
				<span class="error"> <?php ?></span>
				<input type="password" id = "passAcc" name = "password_enter"/> 
				<br>
				
				Verify Password: <br>
				<span class="error"> <?php ?></span>
				<input type="password" id = "passverifyAcc" name = "passwordverify_enter"/>
				<br>
				 
				<br>
				<input type ="submit" onclick = "verifyAcc()" name = "createacc" Value = "Create"/>
				<input type ="button" onclick = "logout()" Value = "Cancel"/>
			</form>
		</div>
		
		<div id = "posts">
			<?php	
				require_once('connect.php');
				$query = "SELECT * FROM posts ORDER BY timestamp DESC"; //You don't need a ; like you do in SQL
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result))
				{   //Creates a loop to loop through results
					$profileInfo= "SELECT * FROM profile WHERE profileID='$row[User_ID]'";
					$profileQ = mysql_query($profileInfo);
					//check if this is valid
					if($profileQ)
					{
						if(mysql_num_rows($profileQ) > 0)
						{
								$getProfile = mysql_fetch_assoc($profileQ);
								$printThis = $row['info'];
								$typee = $row['type'];
								$username = $getProfile['username'];
								$privacy = $getProfile['privacy'];
								$postTime = strtotime($row['timestamp']);
								$date = date('M d, Y', $postTime);
								$time = date("g:i A", $postTime);
								$privacy = $getProfile['privacy'];
								$profile_ID = $row['User_ID'];
								$post_ID = $row['postID'];

								if(!isset($_SESSION['SEARCHV'])) {
								$_SESSION['SEARCHV'] = '';
								}
								//echo $_SESSION['SEARCHV'];
								$validPost = checkLabels($_SESSION['SEARCHV'], $post_ID);
								
								if ($validPost)
								{
									//created the function for it
									if($privacy == 'Open')
									{
										posting($typee, $printThis, $username, $privacy, $date, $time, $profile_ID, $post_ID);
									}
									else if($privacy == 'Private' && $username == $_SESSION['SESS_ACTUAL_USER'])
									{
										posting($typee, $printThis, $username, $privacy, $date, $time, $profile_ID, $post_ID);
									}
									else if($privacy == 'Friends Only')
									{
											//if this is your post, display it
											if ($username == $_SESSION['SESS_ACTUAL_USER']) posting($typee, $printThis, $username, $privacy, $date, $time, $profile_ID, $post_ID);
											else
											{
												//now check to see if this person is your friend
												$query2 = "SELECT * from friends";
												$result2 = mysql_query($query2);
												while ($row = mysql_fetch_array($result2))
												{
													if ($row['User_ID_1'] == $_SESSION['SESS_LOGIN_ID'] && $row['User_ID_2'] == $profile_ID)
													{
														posting($typee, $printThis, $username, $privacy, $date, $time, $profile_ID, $post_ID);
													}
												}
											}
										
									}
								}
						}
					}
					else
					{
						echo "ERROR IN POSTING";
					}

				}
				?>
		</div>
		
		<div id = "posting">
			<form action="posts.php" method="post">
			<div id = "quote">
					Submit a Quote:<br>
					<textarea class = "form-group" style="color:darkCyan" rows="4" cols="80" name = "quote_enter"/></textarea> <br>
					Enter any Tags: <input type = "text" style="color:darkCyan" size = "50" name = "tags_quote"> <br><br>
					<input type="submit" style="font-face: 'Comic Sans MS'; color: black;" value = "Submit" name =  "quote_sub"/>

			</div>

			<div id = "text">

					Submit Text:<br>
					<textarea class = "form-group" style="color:darkCyan" rows="4" cols="80" name = "text_enter" /></textarea> <br>
					Enter any Tags: <input type = "text" style="color:darkCyan" size = "50" name = "tags_text"> <br><br>
					<input type="submit" style="font-face: 'Comic Sans MS'; color: black;" value = "Submit" name = "text_sub"/>

			</div>

			<div id = "link">
					Submit any URL:<br>
					<input type = "text" style="color:darkCyan" size = "50" name = "link_enter"> <br>
					Enter any Tags: <input type = "text" style="color:darkCyan" size = "50" name = "tags_link"> <br><br>
					<input type="submit" style="font-face: 'Comic Sans MS'; color: black;" value = "Submit" name = "link_sub"/>

			</div>

			<div id = "photo">
						Submit a photo URL:<br>
						<input type = "text" style="color:darkCyan" size = "50" name = "pic_enter"> <br>
						Enter any Tags: <input type = "text" style="color:darkCyan" size = "50" name = "tags_photo"> <br><br>
						<input type="submit" style="font-face: 'Comic Sans MS'; color: black;" value = "Submit" name = "pic_sub"/>
			</div>

			<div id = "video">
					Submit a Youtube link:<br>
					<input type = "text" style="color:darkCyan" size = "50" name = "vid_enter"> <br>
					Enter any Tags: <input type = "text" style="color:darkCyan" size = "50" name = "tags_video"> <br><br>
					<input type="submit" style="font-face: 'Comic Sans MS'; color: black;" value = "Submit" name = "vid_sub"/>

			</div>

			<div id = "audio">
						Submit an MP4 link:<br>
						<input type = "text" style="color:darkCyan" size = "50" name = "audio_enter"> <br>
						Enter any Tags: <input type = "text" style="color:darkCyan" size = "50" name = "tags_audio"> <br><br>
						<input type="submit" style="font-face: 'Comic Sans MS'; color: black;" value = "Submit" name = "audio_sub"/>
			</div>

			</form>

		</div>

		<div id = "messageHolder">
			<div id = "displayMsg">	
				<p> Messages: </p> <br>
					<?php displayMessages();?>
				<br>
				<button type="button" style="font-face: 'Comic Sans MS'; color: black;" onclick = "showCreateMsg(0)">New Message</button>
			</div>
			
			<div id = "createMsg">
				<form action="inbox.php" method="post">
					Select a friend: <br>
					<select name = 'tofield' style="color:darkCyan">
					<?php displayFriendSelection();?>
					</select>
					<br>
					Create new message: <br>
						<textarea rows="4" style="color:darkCyan" name = "messagefield"/></textarea> <br>
						<br><br>
						<input type="submit" style="font-face: 'Comic Sans MS'; color: black;" value = "SEND" name = "send_message"/>
						<button type="button" style="font-face: 'Comic Sans MS'; color: black;" onclick = "showCreateMsg(1)">Cancel</button>
				</form>
			</div>
		</div>
		
		<div id = "profHolder">
			
			<div id = "upProf">
				<form action="updateprofile.php" method="post">
					Update Picture: <br>
					<input type="text" style="color:darkCyan" name = "picture_update"/> <br>
						
					Update Nickname: <br>
					<input type="text" style="color:darkCyan" name = "nickname_update"/> <br>
				
					Update Interests: <br>
					<textarea rows="4" style="color:darkCyan" name = "interests_update"/></textarea> <br>

					Update Blog Description: <br>
					<textarea rows="4" style="color:darkCyan" name = "blogdes_update"/></textarea> <br>
					
					Update Blog Privacy: <br>
					<select name="privacy_update" style="color:darkCyan" >
						<option value="Select">Select...</option>
						<option value="Open">Open</option>
						<option value="Friends Only">Friends Only</option>
						<option value="Private">Private</option>
					</select><br><br>
				
					<input type ="submit" style="font-face: 'Comic Sans MS'; color: black;" name = "update_profile" Value = "Update Profile"/>
					<button type="button" style="font-face: 'Comic Sans MS'; color: black;" onclick = "showUpdate(1)">Cancel</button>
				</form>
			</div>
			
			<div id="OtherProfile">
				<img id="profPic" src ="<?php get_ProfileInfo('photo', $_SESSION['PID'])?>"/>
				<p><b>Username:</b>
				<?php get_ProfileInfo('username', $_SESSION['PID']);?></p>
				<p><b>Nickname:</b>
				<?php get_ProfileInfo('nickname', $_SESSION['PID']);?></p>
				<p><b>Gender: </b>
				<?php get_ProfileInfo('gender', $_SESSION['PID']);?></p>
				<p><b>Created: </b>
				<?php niceDate(return_ProfileInfo('profilecreation', $_SESSION['PID']))?></p>
				<p><b>Date of Birth: </b>
				<?php niceDate(return_ProfileInfo('birthday', $_SESSION['PID']))?></p>
				<P><b>Interests: </b> 
				<?php get_ProfileInfo('interests', $_SESSION['PID'])?></P>
				<P><b>Blog Description: </b> 
				<?php get_ProfileInfo('blogdesc', $_SESSION['PID'])?></P>
				<P><b>Blog Privacy: </b> 
				<?php get_ProfileInfo('privacy', $_SESSION['PID'])?></P>
				<?php
			
				$friend_success = true;
				$query = "SELECT * from friends";
				$result = mysql_query($query);
				while ($row = mysql_fetch_array($result))
				{
					if ($row['User_ID_1'] == $_SESSION['SESS_LOGIN_ID'] && $row['User_ID_2'] == $_SESSION['PID'])
					{
						$friend_success = false;
					}
				}
				require_once('connect.php');
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result))
				{   //Creates a loop to loop through results
					$profileInfo= "SELECT * FROM profile WHERE profileID='$_SESSION[PID]'";
					$profileQ = mysql_query($profileInfo);
					//check if this is valid
					if($profileQ)
					{
						if(mysql_num_rows($profileQ) > 0)
						{
								$getProfile = mysql_fetch_assoc($profileQ);
								$username = $getProfile['username'];

						}
					}
				}
				
				if($_SESSION['PID'] != $_SESSION['SESS_LOGIN_ID'] && $friend_success == true)
				{
					?>
					<form action="inbox.php" method="post">
						<div id = "Friend_Request">
							<input type = "hidden" value = "<?php echo $username ?>" name = "FR_enter"/>
							<input type="submit" value = "Add Friend!" name =  "FR_sub"/>
						</div>
					</form>
					<?php
				}
				else{
					echo "You are friends with this user already";
				}
				?>
				<?php	
				require_once('connect.php');
				$query = "SELECT * FROM posts ORDER BY timestamp DESC"; //You don't need a ; like you do in SQL
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result))
				{   //Creates a loop to loop through results
					$profileInfo= "SELECT * FROM profile WHERE profileID='$row[User_ID]'";
					$profileQ = mysql_query($profileInfo);
					//check if this is valid
					if($profileQ)
					{
						if(mysql_num_rows($profileQ) > 0)
						{
							$getProfile = mysql_fetch_assoc($profileQ);
							$printThis = $row['info'];
							$typee = $row['type'];
							$username = $getProfile['username'];
							$privacy = $getProfile['privacy'];
							$postTime = strtotime($row['timestamp']);
							$date = date('M d, Y', $postTime);
							$time = date("g:i A", $postTime);
							$privacy = $getProfile['privacy'];
							$profile_ID = $row['User_ID'];
							$post_ID = $row['postID'];

							//makes sure only specified posts are displayed
							if($profile_ID == $_SESSION['PID'])
							{
								posting($typee, $printThis, $username, $privacy, $date, $time, $profile_ID, $post_ID);
							}
						}
					}
					else
					{
						echo "ERROR IN POSTING";
					}
				}
				?>
				
			</div>
			
			<div id="profile">
				<img id="profPic" src ="<?php get_ProfileInfo('photo', $temp_ID)?>"/>
				<p><b>Username:</b>
				<?php get_ProfileInfo('username', $temp_ID);?></p>
				<p><b>Nickname:</b>
				<?php get_ProfileInfo('nickname', $temp_ID);?></p>
				<p><b>Gender: </b>
				<?php get_ProfileInfo('gender', $temp_ID);?></p>
				<p><b>Created: </b>
				<?php niceDate(return_ProfileInfo('profilecreation', $temp_ID))?></p>
				<p><b>Date of Birth: </b>
				<?php niceDate(return_ProfileInfo('birthday', $temp_ID))?></p>
				<P><b>Interests: </b> 
				<?php get_ProfileInfo('interests', $temp_ID)?></P>
				<P><b>Blog Description: </b> 
				<?php get_ProfileInfo('blogdesc', $temp_ID)?></P>
				<P><b>Blog Privacy: </b> 
				<?php get_ProfileInfo('privacy', $temp_ID)?></P>
				<button type="button" style="font-face: 'Comic Sans MS'; color: black;" onclick = "showUpdate(0)">Update Profile</button>
				</br></br>
				
				<?php	
				require_once('connect.php');
				$query = "SELECT * FROM posts ORDER BY timestamp DESC"; //You don't need a ; like you do in SQL
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result))
				{   //Creates a loop to loop through results
					$profileInfo= "SELECT * FROM profile WHERE profileID='$row[User_ID]'";
					$profileQ = mysql_query($profileInfo);
					//check if this is valid
					if($profileQ)
					{
						if(mysql_num_rows($profileQ) > 0)
						{
							$getProfile = mysql_fetch_assoc($profileQ);
							$printThis = $row['info'];
							$typee = $row['type'];
							$username = $getProfile['username'];
							$privacy = $getProfile['privacy'];
							$postTime = strtotime($row['timestamp']);
							$date = date('M d, Y', $postTime);
							$time = date("g:i A", $postTime);
							$privacy = $getProfile['privacy'];
							$profile_ID = $row['User_ID'];
							$post_ID = $row['postID'];

							//makes sure only specified posts are displayed
							if($profile_ID == $temp_ID)
							{
								posting($typee, $printThis, $username, $privacy, $date, $time, $profile_ID, $post_ID);
							}
						}
					}
					else
					{
						echo "ERROR IN POSTING";
					}
				}
				?>
				
			</div>
		</div>
		<div id = "searchHolder">
				<a> HUE </a>
		</div>
	</body>
</html>

<script type = "text/javascript">

var sessionValue = "<?php echo $_SESSION['SESS_LOGIN_ID'] ?>";
check(sessionValue);
	
</script>
