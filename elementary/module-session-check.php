<?php
	session_start();
	$li_user = "no-user";
	$li_uid = "0";
	$li_fullname = "";
	if(isset($_SESSION['jeclat13_useremail'])) {
		$li_user = $_SESSION['jeclat13_useremail'];
		$li_uid = $_SESSION['jeclat13_uid'];
		$li_fullname = $_SESSION['jeclat13_fullname'];
	}
	
?>
