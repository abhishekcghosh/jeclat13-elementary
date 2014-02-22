<?php
	function sendMail($emailid)
	{
		//send mail
			$sender = $emailid;
			$receiver = "mail@jeclat.in";
			$client_ip = $_SERVER['REMOTE_ADDR'];
			$email_body_auto_reply = "Hello dada/didi, \n\nThis is an auto-reply message. Thank you for your registration on our website. \n\nFor any kind of information regarding the Alumni Reunion at JECLAT 2013, please kindly contact: \n\nBishal Jha\nbishal.j@jeclat.in\n+91-9800050894\n\nWith Sincere Regards,\nJECLAT 2013 COMMITTEE\nwww.jeclat.in";
			$extra_auto_reply = "From: mail@jeclat.in\r\nReply-To: " . stripslashes($receiver) . "\r\n" . "X-Mailer: PHP/" . phpversion();
			mail( $sender, "JECLAT 2013 Alumni Registration :: Auto-reply", $email_body_auto_reply, $extra_auto_reply );
	}
?>
<?php 
	require_once('module-config.php');
	require_once('module-sql-connect.php'); 

	$name=addslashes(strip_tags(trim($_POST['na'])));
	$collegenick=addslashes(strip_tags(trim($_POST['ni'])));
	$yearofpassout=addslashes(strip_tags(trim($_POST['ye'])));
	$department=addslashes(strip_tags(trim($_POST['de']))); 
	$company=addslashes(strip_tags(trim($_POST['co']))); 
	$phone=addslashes(strip_tags(trim($_POST['ph']))); 
	$emailid=addslashes(strip_tags(trim($_POST['em']))); 
	$attendingstatus=addslashes(strip_tags(trim($_POST['st']))); 
	$flag_incomplete=0;
	$flag_sqlfail=0;
	$flag_emailid=0;
	if($name=='' || $yearofpassout=='' || $department=='' || $company=='' || $phone=='' || $emailid=='' )
	{
		$flag_incomplete=1;
		$err_occured=1;
	}
	if (!filter_var($emailid, FILTER_VALIDATE_EMAIL))
	{
		$flag_emailid=1;
		$err_occured=1;
	}
	if($err_occured!=1)
	{
		$tbl_name=__SQL_TABLE_PREFIX__ . "alumni";
		$sql_query="INSERT INTO $tbl_name(name,collegenick,yearofpassout,department,company,phone,emailid,attendingstatus) VALUES('$name','$collegenick','$yearofpassout','$department','$company','$phone','$emailid','$attendingstatus')";
		$query_result=mysql_query($sql_query);
		if(!$query_result)
		{
			$flag_sqlfail=1;
			$err_occured=1;
		}
		else
		{
			$message='';
			sendMail($emailid);
		}
	}
	mysql_close($con);
	$err_string="";
	if($err_occured==1)
	{
		if($flag_sqlfail==1 || $flag_confail==1)
		{
			$err_string='Registration failed due to technical problem. Sorry for the inconvenience. Please try again later.';
		}
		else if($flag_incomplete==1)
		{
			$err_string='One or more fields empty!';
		}
		else if($flag_emailid==1)
		{
			$err_string='The email address you provided is invalid. Please provide a valid email address!';
		}
	}
	else
	{
		$err_string='REG_SUCCESS';
	}
	echo $err_string;
?>
