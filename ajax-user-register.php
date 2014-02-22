<?php
	function sendMail($emailid,$pass,$name)
	{
		//send mail
			$sender = $emailid;
			$receiver = "mail@jeclat.in";
			$client_ip = $_SERVER['REMOTE_ADDR'];
			$email_body_auto_reply = "Hello " . $name . ", \n\nThis is an auto-reply message.\n\nYou have been successfully registered on our website. Your account password is " . $pass . "\n\nFor any kind of information, drop a mail at mail@jeclat.in\n\nWith Regards,\nJECLAT 2013 COMMITTEE\nwww.jeclat.in";
			$extra_auto_reply = "From: mail@jeclat.in\r\nReply-To: " . stripslashes($receiver) . "\r\n" . "X-Mailer: PHP/" . phpversion();
			mail( $sender, "JECLAT 2013 User Registration :: Auto-reply", $email_body_auto_reply, $extra_auto_reply );
	}
?>
<?php 
	require_once('module-config.php');
	require_once('module-sql-connect.php'); 

	$name=addslashes(strip_tags(trim($_POST['na'])));
	$college=addslashes(strip_tags(trim($_POST['co'])));
	$phone=addslashes(strip_tags(trim($_POST['ph']))); 
	$emailid=addslashes(strip_tags(trim($_POST['em']))); 
	$flag_incomplete=0;
	$flag_sqlfail=0;
	$flag_illegal=0;
	$flag_emailid=0;
	$flag_exists_emailid=0;
	if($name=='' || $college=='' || $phone=='' || $emailid=='' )
	{
		$flag_incomplete=1;
		$err_occured=1;
	}
	if(!(strpos($name,"|")===false && strpos($emailid,"|")===false)) {
		$flag_illegal=1;
		$err_occured=1;
	}
	if(strtolower($name)=="admin") {
		$flag_illegal=1;
		$err_occured=1;
	}
	if (!filter_var($emailid, FILTER_VALIDATE_EMAIL))
	{
		$flag_emailid=1;
		$err_occured=1;
	}
	if($err_occured!=1)
	{
		$tbl_name=__SQL_TABLE_PREFIX__ . "users";
		$sql_query="SELECT COUNT(*) AS existing FROM $tbl_name WHERE emailid='$emailid'";
		$query_result=mysql_query($sql_query);
		$result_rows=mysql_fetch_array($query_result);
		$existing_count=$result_rows['existing'];
		if($existing_count!=0) 
		{
			$flag_exists_emailid=1;
			$err_occured=1;
		}
		else
		{
			
			$password=substr(md5(rand(0,1000000)),1,10);
			$md5password=md5($password);
			$tbl_name=__SQL_TABLE_PREFIX__ . "users";
			$sql_query="INSERT INTO $tbl_name(fullname,college,phone,emailid,password) VALUES('$name','$college','$phone','$emailid','$md5password')";
			$query_result=mysql_query($sql_query);
			if(!$query_result)
			{
				$flag_sqlfail=1;
				$err_occured=1;
			}
			else
			{
				$message='';
				sendMail($emailid,$password,$name);
			}
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
		else if($flag_illegal==1)
		{
			$err_string='Illegal characters in name or email address. Please provide valid data!';
		}
		else if($flag_exists_emailid==1)
		{
			$err_string='A registered account with the same email address already exists. Please provide a unique email address!';
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
