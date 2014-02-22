<?php

	//requires
	require_once('module-config.php');
	require_once('module-sql-connect.php');
	
	//fetch session login user id, redirect to log in page if not logged in
	require_once('module-session-check.php');
	if($li_user!="no-user") {
		header("location: level.php");		
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
<title>reset password</title>
</head>
<body>
	<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td style="height: 100px">&nbsp;  </td>
        </tr>
        <tr>
        	<td align="center" valign="middle">
            	<div class="rulesContainer">
                	<form name="resetPassword" method="post" action="reset-password-be.php">
                	<table border="0" cellpadding="0" cellspacing="0" >
                    	<tr>
                        	<td width="160px" align="left">Enter your Email</td>
                            <td><input class="formItemsPassword" type="text" name="e" value="" maxlength="256" style="width: 530px;"/></td>
                        </tr>
                        <tr>
                        	<td>&nbsp;</td>
                            <td align="left"><input class="formItemsPassword" type="submit" name="submit" value="Reset Password" /></td>
                        </tr>
                       
                        <tr>
                        	<td></td>
                            <td>
                            	<span class="changePasswordFeedback" id="changePassword_feedback">
                            		<?php
										if($message=='techfail') {
											echo 'Password reset in failed due to technical problem. Sorry for the inconvenience. Please try again later.';
										} else if($message=='incomplete') {
											echo 'Email field empty';
										} else if($message=='notexists') {
											echo 'Your email address does not exist in your database';											
										} else if ($message=='success') {
											echo '<span style="color: #060; font-size: 16px">A mail with the new password has been sent to your email address.<br>In case you don\'t find an email, don\'t forget to check the SPAM folder.</span>';
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
            <td class="topBarItem" align="center" valign="middle" id="tbi_levelinfo">reset password</td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_buffer1"></td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_user">
            	<span id="accountUsername">menu</span>
                <ul class="accountOptions" style="right: 10px;">
                	<li><a class="accountOptionsLinks" href="level.php">back</a></li>
                </ul>
            </td>
        </tr>
    </table>
    
    
</body>
</html>