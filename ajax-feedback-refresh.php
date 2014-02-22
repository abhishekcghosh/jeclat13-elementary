<?php 
	require_once('module-config.php');
	require_once('module-sql-connect.php'); 
	$lastid=addslashes(strip_tags(trim($_GET['id'])));
	$tbl_name=__SQL_TABLE_PREFIX__ . "feedback";
	$sql_query="SELECT fid, message, name FROM $tbl_name WHERE fid>'$lastid' ORDER BY fid DESC LIMIT 0,100";
	$query_result=mysql_query($sql_query);
	$printed=0;
	$mfid=0;
	while($row=mysql_fetch_array($query_result))
	{
		$fid=stripslashes($row['fid']);
		if($fid>$mfid) { $mfid=$fid; }
		$name=stripslashes($row['name']);
		$message=stripslashes($row['message']);
		echo '<div class="feedbackItem">' . $message . '<br /><em style="color: #ccc"> - ' . $name . '</em></div>';
		$printed=1;
	}
	if($printed==0) { echo 'POST_NULL'; } 
	else 
	{
		echo '|' . $mfid;
	}
	mysql_close($con);
?>