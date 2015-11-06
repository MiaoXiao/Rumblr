<?php
function get_ProfileInfo($info)
{
	//echo $_SESSION['SESS_USERNAME'];
	$query = "SELECT * from profile";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		//echo $_SESSION['SESS_LOGIN_ID'];
		if ($row['profileID'] == $_SESSION['SESS_LOGIN_ID'])
		{
			echo $row[$info];
		}
	}
}
?>
