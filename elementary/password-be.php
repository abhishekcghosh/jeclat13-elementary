<?php
	//requires
	require_once('module-config.php');
	require_once('module-sql-connect.php');
	
	//fetch session login user id, redirect to log in page if not logged in
	require_once('module-session-check.php');
	if($li_user=="no-user") {
		header("location: cover.php?s=starti");
		exit(0);
	}
	
	
	$old = addslashes(strip_tags(trim($_POST['old'])));
	$new = addslashes(strip_tags(trim($_POST['new'])));
	$retype = addslashes(strip_tags(trim($_POST['retype'])));
	
	$flag_incomplete=0;
	$flag_sqlfail=0;
	$flag_wrong=0;
	$flag_mismatch=0;
	
	if($old=='' || $new=='' || $retype=='')
	{
		$flag_incomplete=1;
		$err_occured=1;
	}
	
	if($new!=$retype)
	{
		$flag_mismatch=1;
		$err_occured=1;
	}
	
	if($err_occured!=1) {
		
		$oldmd5 = md5($old);
		$newmd5 = md5($new);
		
		$tbl_name=__SQL_TABLE_PREFIX__ . "users";
		$sql_query="SELECT COUNT(*) AS existing FROM $tbl_name WHERE uid='$li_uid' AND password='$oldmd5'";
		$query_result=mysql_query($sql_query);
		$result_rows=mysql_fetch_array($query_result);
		$existingcount=$result_rows['existing'];
		if($existingcount==0) {
			//old password mismatch, error
			$flag_wrong=1;
			$err_occured=1;
		}
		else {
			//old password matches, proceed
			$tbl_name=__SQL_TABLE_PREFIX__ . "users";
			$sql_query="UPDATE $tbl_name SET password='$newmd5' WHERE uid='$li_uid'";
			$query_result=mysql_query($sql_query);		
			$err_occured = 0;
		}
	
	}
	mysql_close($con);
	
	$header_path = "password.php?m=";
	$err_string="";
	if($err_occured==1)
	{
		if($flag_sqlfail==1 || $flag_confail==1)
		{
			$err_string='techfail'; 
		}
		else if($flag_incomplete==1)
		{
			$err_string='incomplete';
		}
		else if($flag_mismatch==1)
		{
			$err_string='mismatch';
		}
		else if($flag_wrong==1)
		{
			$err_string='wrong';
		}
		
	}
	else
	{
		$header_path = "password.php?m=";
		$err_string = "success";
	}
	header("location: " . $header_path . $err_string);
	
?>