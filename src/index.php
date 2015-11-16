<!DOCTYPE html>
<script src="handling.js"></script>
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
<body style="background-color:DarkCyan">
	<head> 
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="handling.js"></script>
		<?php //include 'connect.php';?>
		<?php include 'createacc.php';?>
		<?php include 'updateprofile.php';?>
		<?php include 'posts.php';?>
		<?php include 'inbox.php';?>
		<?php //include 'login.php';?>
	</head>
	<div id = "header">
		<header id = "title">
			<h1 >UCRumbler</h1>
		</header>
		<div id = "navi">
			<div class = "topSelect">
				<a onclick = "hide(2)"> Front Page </a>
			</div>
			<div class = "topSelect">
				<a onclick = "hide(3)"> Profile </a>
			</div>
			<div class = "topSelect">
				<a onclick = "hide(4)"> Inbox </a>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	
	<div id = "Body">
		
	<div class="row" id = "searchBar">
	  <div class="col-lg-6">
		<div class="input-group">
		  <input type="text" class="form-control" placeholder="Search for...">
		  <span class="input-group-btn">
			<button class="btn btn-default" type="button">Go!</button>
		  </span>
		</div><!-- /input-group -->
	  </div><!-- /.col-lg-6 -->
	</div><!-- /.row -->
		
		<div id = "postBar">
			<a onclick = "post(0)">Text</a><br>

			<a onclick = "post(1)">Photo </a><br>

			<a onclick = "post(2)">Quote </a><br>
			
			<a onclick = "post(3)">Link</a><br>

			<a onclick = "post(4)">Chat </a><br>

			<a onclick = "post(5)">Audio </a><br>
			<a onclick = "post(6)">Video </a><br>
			
			<a onclick = "hide(3)"> Welcome, <?php echo $_SESSION['SESS_ACTUAL_USER']; ?>. </a><br>
			<a href= "http://localhost:80/Rumblr/logout.php">Sign out?</a>
			<!--<a href= "http://localhost:80/Rumblr/src/logout.php">Sign out?</a>-->
		</div>
		
		<div id = "login">
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
				$query = "SELECT * FROM posts"; //You don't need a ; like you do in SQL
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result))
				{   //Creates a loop to loop through results
					$profileInfo= "SELECT * FROM profile WHERE profileID='$row[postID]'";
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
								$date = date('m-d-Y', $postTime);
								$time = date('h:i:s:a', $postTime);
								$privacy = $getProfile['privacy'];

								//created the function for it
								if($privacy == 'Open')
								{
									posting($typee, $printThis, $username, $privacy, $date, $time);
								}
								else if($privacy == 'Private' && $username != $_SESSION['SESS_ACTUAL_USER'])
								{
									//do nothing
								}
								else if($privacy == 'Friends Only')
								{
									//do nothing
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
					Create QUOTE post:<br>
					<textarea rows="4" cols="50" name = "quote_enter"/></textarea> <br>
					<br><br>
					<input type="submit" value = "POST!" name =  "quote_sub"/>

			</div>

			<div id = "text">

					Create TEXT post:<br>
					<textarea rows="4" cols="50" name = "text_enter"/></textarea> <br>
					<br><br>
					<input type="submit" value = "POST!" name = "text_sub"/>

			</div>

			<div id = "link">
					Create LINK post:<br>
					<input type = "text" size = "50" name = "link_enter"/>
					<br><br>
					<input type="submit" value = "POST!" name = "link_sub"/>

			</div>

			<div id = "chat">
					Create CHAT post:<br>
					<textarea rows="4" cols="50" name = "chat_enter"/></textarea> <br>
					<br><br>
					<input type="submit" value = "POST!" name = "chat_sub"/>

			</div>
			
			<div id = "photo">
					Create PHOTO post:<br>
					<textarea rows="4" cols="50" name = "pic_enter"/></textarea> <br>
					<br><br>
					<input type="submit" value = "POST!" name = "pic_sub"/>

			</div>
			<div id = "video">
					Create VIDEO post:<br>
					<textarea rows="4" cols="50" name = "vid_enter"/></textarea> <br>
					<br><br>
					<input type="submit" value = "POST!" name = "vid_sub"/>

			</div>
			<div id = "audio">
					Create AUDIO post:<br>
					<textarea rows="4" cols="50" name = "audio_enter"/></textarea> <br>
					<br><br>
					<input type="submit" value = "POST!" name = "audio_sub"/>

				
				</div>
			</form>

		</div>
		<div id = "messageHolder">
			<div id = "displayMsg">	
				<p> Messages: </p> <br>
					<?php displayMessages();?>
				<br>
				<button type="button" onclick = "showCreateMsg(0)">New Message</button>
			</div>
			
			<div id = "createMsg">
				<form action="inbox.php" method="post">
					Select a friend: <br>
					<select name = 'tofield'>
					<?php displayFriendSelection();?>
					</select>
					<br>
					Create new message: <br>
						<textarea rows="4" cols="50" name = "messagefield"/></textarea> <br>
						<br><br>
						<input type="submit" value = "SEND" name = "send_message"/>
						<button type="button" onclick = "showCreateMsg(1)">Cancel</button>
				</form>
			
			</div>
		</div>
		
		<div id = "profHolder">
			<div id="profile">
				<img id="profPic" src ="<?php get_ProfileInfo('photo')?>"/>
				<p><b>Username:</b>
				<?php get_ProfileInfo('username');?></p>
				<p><b>Nickname:</b>
				<?php get_ProfileInfo('nickname');?></p>
				<p><b>Gender: </b>
				<?php get_ProfileInfo('gender');?></p>
				<p><b>Created: </b>
				<?php get_ProfileInfo('profilecreation')?></p>
				<p><b>Date of Birth: </b>
				<?php get_ProfileInfo('birthday')?></p>
				<P><b>Interests: </b> 
				<?php get_ProfileInfo('interests')?></P>
				<P><b>Blog Description: </b> 
				<?php get_ProfileInfo('blogdesc')?></P>
				<P><b>Blog Privacy: </b> 
				<?php get_ProfileInfo('privacy')?></P>
				<button type="button" onclick = "showUpdate(0)">Update Profile</button>
				</br></br>
				
				<?php	
				require_once('connect.php');
				$query = "SELECT * FROM posts"; //You don't need a ; like you do in SQL
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result))
				{   //Creates a loop to loop through results
					$profileInfo= "SELECT * FROM profile WHERE profileID='$row[postID]'";
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
							$date = date('m-d-Y', $postTime);
							$time = date('h:i:s:a', $postTime);
							$privacy = $getProfile['privacy'];
							$profile_ID = $row['postID'];

							//makes sure only your own posts are displayed
							if($profile_ID == $_SESSION['SESS_LOGIN_ID'])
							{
								posting($typee, $printThis, $username, $privacy, $date, $time);
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

			<div id = "upProf">
				<form action="updateprofile.php" method="post">
					Update Picture: <br>
					<input type="text" name = "picture_update"/> <br>
						
					Update Nickname: <br>
					<input type="text" name = "nickname_update"/> <br>
				
				Update Interests: <br>
					<textarea rows="4" cols="50" name = "interests_update"/></textarea> <br>

				Update Blog Description: <br>
				<textarea rows="4" cols="50" name = "blogdes_update"/></textarea> <br>
					
				Update Blog Privacy: <br>
				<select name="privacy_update">
					<option value="Select">Select...</option>
					<option value="Open">Open</option>
					<option value="Friends Only">Friends Only</option>
					<option value="Private">Private</option>
				</select><br>
				
				<input type ="submit" name = "update_profile" Value = "Update Profile"/>
				<button type="button" onclick = "showUpdate(1)">Cancel</button>
			</form>
		</div>
	
	</div>
	<div id = "Footer"> 
		<footer>
			HUEHUEHUEHUHEHUEHUE
		</footer>
	</div>
</body>
</html>
