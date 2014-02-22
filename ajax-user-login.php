<?php 
	require_once('module-config.php');
	require_once('module-sql-connect.php'); 

	$emailid=addslashes(strip_tags(trim($_POST['em']))); 
	$password=addslashes(strip_tags(trim($_POST['pa']))); 
	$md5password=md5($password);
	$flag_incomplete=0;
	$flag_sqlfail=0;
	$flag_wrong=0;
	if($emailid=='' || $password=='')
	{
		$flag_incomplete=1;
		$err_occured=1;
	}
	if($err_occured!=1)
	{
		$tbl_name=__SQL_TABLE_PREFIX__ . "users";
		$sql_query="SELECT COUNT(*) AS existing FROM $tbl_name WHERE emailid='$emailid' AND password='$md5password'";
		$query_result=mysql_query($sql_query);
		$result_rows=mysql_fetch_array($query_result);
		$existing_count=$result_rows['existing'];
		if($existing_count==0) 
		{
			$flag_wrong=1;
			$err_occured=1;
		}
		else
		{
			
			session_start();
			$_SESSION['jeclat13_useremail']=strtolower($emailid);
			$tbl_name=__SQL_TABLE_PREFIX__ . "users";
			$sql_query="SELECT uid,fullname FROM $tbl_name WHERE emailid='$emailid'";
			$query_result=mysql_query($sql_query);
			$result_rows=mysql_fetch_array($query_result);
			$_SESSION['jeclat13_uid']=$result_rows['uid'];
			$_SESSION['jeclat13_fullname']=$result_rows['fullname'];
		}
		
	}
	mysql_close($con);
	$err_string="";
	if($err_occured==1)
	{
		if($flag_sqlfail==1 || $flag_confail==1)
		{
			$err_string='Log In failed due to technical problem. Sorry for the inconvenience. Please try again later.';
		}
		else if($flag_incomplete==1)
		{
			$err_string='One or more fields empty!';
		}
		else if($flag_wrong==1)
		{
			$err_string='Wrong Email or Password!';
		}
		
	}
	else
	{
		$err_string='LOGIN_SUCCESS|' . $result_rows['fullname'] . '|' . $emailid;
	}
	echo $err_string;
?>
