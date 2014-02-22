<?php
	require_once('../module-config.php');
	require_once('../module-sql-connect.php'); 

	$err_occured=0;
	$flag_csrf=0;
	$flag_incomplete=0;
	$flag_sqlfail=0;
	
	if(!isset($_POST['token']) || !isset($_POST['updatevalue'])) 
	{
		//die
		$err_occured=1;
		$flag_csrf=1;
	}
	else
	{	
		$rtoken=$_POST['token'];
		$uvalue=addslashes(strip_tags(trim($_POST['updatevalue'])));
		
		if(isset($_COOKIE['update_token']) && $_COOKIE['update_token']==$rtoken)
		{
			//pass
		}
		else
		{
			//die
			$err_occured=1;
			$flag_csrf=1;
		}
			
		if($uvalue=='')
		{
			$flag_incomplete=1;
			$err_occured=1;
		}
	}
	
	
	
	if($err_occured!=1)
	{
		$tbl_name=__SQL_TABLE_PREFIX__ . "updates";
		$sql_query="INSERT INTO $tbl_name(updatevalue) VALUES('$uvalue')";
		$query_result=mysql_query($sql_query);
		if(!$query_result)
		{
			$flag_sqlfail=1;
			$err_occured=1;
		}
	}
	mysql_close($con);
	
	$err_string="";
	
	if($err_occured==1)
	{
		if($flag_sqlfail==1 || $flag_confail==1)
		{
			$err_string='<code style="color: #f00">Update entry failed due to technical problem. Sorry for the inconvenience. Please try again later.</code>';
		}
		else if($flag_csrf==1)
		{
			$err_string='<code style="color: #f00">Illegal data entry point or CSRF!! If you find this error inappropriate, please enable Cookies in your browser and retry.</code>';
		}
		else if($flag_incomplete==1)
		{
			$err_string='<code style="color: #f00">No data provided!</code>';
		}
		
	}
	else
	{
		$err_string='<code style="color: #090">Update Entry Successful!</code>';
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="description" content="JECLAT 13, The Annual Cultural Festival of Jalpaiguri Government Engineering College" />
<meta name="keywords" content="cultural, festival, fest, 2013, jgec, jalpaiguri, engineering, college, competitions, events, annual, reunion, ojasvin, irina, seminar, social, night, grand" />
<meta name="author" content="Abhishek Ghosh" />
<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico" />
<title>JECLAT 13 - Admin Panel</title>
<style type="text/css">
	body {
		background-color: #eee;
		font-family: "Courier New", Courier, monospace;
		font-size: 1em;
		font-weight: bold;
	}
	input {
		font-family: "Courier New", Courier, monospace;
		font-size: 1em;
	}
</style>

</head>
<body>
	<?php	
        echo strtoupper($err_string);	
    ?>
</body>
</html>