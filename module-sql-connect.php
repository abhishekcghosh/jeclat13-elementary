<?php 
	require_once('module-config.php');
	//Error Flags
	$err_occured=0;
	$flag_confail=0;
	// Connect to MySQL Server
	$con=mysql_connect(__SQL_HOST__,__SQL_USERNAME__,__SQL_PASSWORD__); 
	if(!$con)
	{
		$err_occured=1;
		$flag_confail=1;
	}
	//Select Database
	$con_db=mysql_select_db(__SQL_DBNAME__);
	if(!$con_db)
	{
		$err_occured=1;
		$flag_confail=1;
	}	
?>
