<?php
	session_start();
	echo "I'm in here";
	//unset($_SESSION["user_id"]);
	//unset($_SESSION["user_name"]);
	session_destroy();
	header('Location: index.php');
	exit;

?>