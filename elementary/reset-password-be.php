<?php

	function sendMail($emailid,$pass)
	{
		//send mail
			$sender = $emailid;
			$receiver = "mail@jeclat.in";
			$client_ip = $_SERVER['REMOTE_ADDR'];
			$email_body_auto_reply = "Hello, \n\nThis is an auto-reply message.\n\nA password reset was requested for your account. Your new account password is " . $pass . "\n\nFor any kind of information, drop a mail at mail@jeclat.in\n\nWith Regards,\nJECLAT 2013 COMMITTEE\nwww.jeclat.in";
			$extra_auto_reply = "From: mail@jeclat.in\r\nReply-To: " . stripslashes($receiver) . "\r\n" . "X-Mailer: PHP/" . phpversion();
			mail( $sender, "JECLAT 2013 User Account :: Password Reset", $email_body_auto_reply, $extra_auto_reply );
	}


	//requires
	require_once('module-config.php');
	require_once('module-sql-connect.php');
	
	//fetch session login user id, redirect to log in page if not logged in
	require_once('module-session-check.php');
	if($li_user!="no-user") {
		header("location: level.php");		
	}
	
	$e = addslashes(strip_tags(trim($_POST['e'])));
	
	$flag_incomplete=0;
	$flag_sqlfail=0;
	$flag_notexists=0;
	
	if($e=='')
	{
		$flag_incomplete=1;
		$err_occured=1;
	}
	
	
	if($err_occured!=1) {
		
		$password=substr(md5(rand(0,1000000)),1,10);
		$md5password=md5($password);
		
		$tbl_name=__SQL_TABLE_PREFIX__ . "users";
		$sql_query="SELECT COUNT(*) AS existing FROM $tbl_name WHERE emailid='$e'";
		$query_result=mysql_query($sql_query);
		$result_rows=mysql_fetch_array($query_result);
		$existingcount=$result_rows['existing'];
		if($existingcount==0) {
			//email not in db
			$flag_notexists=1;
			$err_occured=1;
		}
		else {
			//reset
			$tbl_name=__SQL_TABLE_PREFIX__ . "users";
			$sql_query="UPDATE $tbl_name SET password='$md5password' WHERE emailid='$e'";
			$query_result=mysql_query($sql_query);		
			$err_occured = 0;
			if(!$query_result)
			{
				$flag_sqlfail=1;
				$err_occured=1;
			}
			else
			{
				$message='';
				sendMail($emailid,$password);
			}
		}
	
	}
	mysql_close($con);
	
	$header_path = "reset-password.php?m=";
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
		else if($flag_notexists==1)
		{
			$err_string='notexists';
		}
		
	}
	else
	{
		$header_path = "reset-password.php?m=";
		$err_string = "success";
	}
	header("location: " . $header_path . $err_string);
	
?>