<?php
	
	session_start();									//start session to access session info
	session_destroy();									//destroy session completely
	header("location: cover.php");	
?>
