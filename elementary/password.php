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
	
	$message='';
	if(isset($_GET['m'])) {
		$message = strtolower($_GET['m']);
	}	
	
?>
<!doctype html>
<html>
<head>
<?php require_once('module-head-tag.php'); ?>
<link rel="stylesheet" type="text/css" href="assets/general.css"/>
<title>change password</title>
</head>
<body>
	<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td style="height: 100px">&nbsp;  </td>
        </tr>
        <tr>
        	<td align="center" valign="middle">
            	<div class="rulesContainer" style="text-align: left">
                	<form name="changePassword" method="post" action="password-be.php">
                	<table border="0" cellpadding="0" cellspacing="0" >
                    	<tr>
                        	<td width="130px">Old password</td>
                            <td><input class="formItemsPassword" type="password" name="old" value="" maxlength="32" /></td>
                        </tr>
                        <tr>
                        	<td>New password</td>
                            <td><input class="formItemsPassword" type="password" name="new" value="" maxlength="32" /> &nbsp; <span style="font-size: 14px; color: #333;">Don't use space in your password</span></td>
                        </tr>
                        <tr>
                        	<td>Retype</td>
                            <td><input class="formItemsPassword" type="password" name="retype" value="" maxlength="32" /></td>
                        </tr>
                        <tr>
                        	<td>&nbsp;</td>
                            <td><input class="formItemsPassword" type="submit" name="submit" value="Change Password" /></td>
                        </tr>
                        <tr>
                        	<td></td>
                            <td>
                            	<span class="changePasswordFeedback" id="changePassword_feedback">
                            		<?php
										if($message=='techfail') {
											echo 'Password change in failed due to technical problem. Sorry for the inconvenience. Please try again later.';
										} else if($message=='incomplete') {
											echo 'One or more fields empty';
										} else if($message=='mismatch') {
											echo 'New passwords mismatch';											
										} else if ($message=='wrong') {
											echo 'Wrong old password';
										} else if ($message=='success') {
											echo '<span style="color: #060">Password changed successfully</span>';
										}
										
									?>
                            	</span>
                            </td>
                        </tr>
                    </table>
                    </form>
                	
                </div>
                <div class="footerContainer">
                	Elementary. Copyleft 2013 JECLAT 13 Committee.
                </div>
            </td>
        </tr>
        <tr>
        	<td style="height: 10px;">&nbsp;</td>
        </tr>
    </table>
    
    
    <table class="topBar" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td class="topBarItem" align="center" valign="middle" id="tbi_logo">elementary</td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_levelinfo">change password</td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_buffer1"></td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_user">
            	<span id="accountUsername"><?php echo $li_user; ?></span>
                <ul class="accountOptions" style="right: 10px;">
                	<li><a class="accountOptionsLinks" href="level.php">current level</a></li>
                    <li><a class="accountOptionsLinks" href="leaderboard.php">leaderboard</a></li>
                    <li><a class="accountOptionsLinks" href="logout.php">sign out</a></li>
                </ul>
            </td>
        </tr>
    </table>
    
    
</body>
</html>